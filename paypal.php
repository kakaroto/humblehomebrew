<?php

require_once 'dbc.php';
require_once "config.php";

$first_name = '';
$last_name = '';
$amount = '';
$sgt = $DEFAULT_VALUES['sgt'];
$ps3 = $DEFAULT_VALUES['ps3'];
$eff = $DEFAULT_VALUES['eff'];
$email = '';
$donor = $DEFAULT_VALUES['donor'];
$completed = false;

$tx_token = $_GET['tx'];

if (is_string($tx_token) && $tx_token != "") {
  // read the post from PayPal system and add 'cmd'
  $req = 'cmd=_notify-synch';
  $auth_token = $PAYPAL_IDENTITY_TOKEN;
  $req .= "&tx=$tx_token&at=$auth_token";

  // post back to PayPal system to validate
  $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
  $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
  $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

  // Your PHP server will need to be SSL enabled
  $fp = fsockopen ('ssl://'. $PAYPAL_ENVIRONMENT .'paypal.com', 443, $errno, $errstr, 30);

  if (!$fp) {
    // HTTP ERROR
    mail($PAYPAL_ERROR_DESTINATION, "Error processing Paypal Transaction ".$tx_token,
         "Unable to open socket to paypal, transaction was : ". $tx_token);
    $completed = false;
  } else {
    fputs ($fp, $header . $req);

    // read the body data 
    $res = '';
    $headers = '';
    $headerdone = false;
    while (!feof($fp)) {
      $line = fgets ($fp, 1024);

      if (strcmp($line, "\r\n") == 0) {
        // read the header
        $headerdone = true;
      } else if ($headerdone) {
        // header has been read. now read the contents
        $res .= $line;
      } else {
        $headers .= $line;
      }
    }
    fclose ($fp);

    // parse the data
    $lines = explode("\n", $res);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
      for ($i=1; $i < count($lines); $i++) {
        list($key,$val) = explode("=", $lines[$i]);
        $keyarray[urldecode($key)] = urldecode($val);
      }

      // check the payment_status is Completed
      // check that txn_id has not been previously processed
      // check that receiver_email is your Primary PayPal email
      // check that payment_amount/payment_currency are correct
      // process payment
      $first_name = $keyarray['first_name'];
      $last_name = $keyarray['last_name'];
      $amount = $keyarray['payment_gross'];
      if (isset($keyarray['payment_fee']))
        $fee = $keyarray['payment_fee'];
      else
        $fee = 0;
      $custom = explode(":", $keyarray['custom'], 4);
      if (count($custom) == 4)
        list($sgt, $ps3, $eff, $donor) = $custom;
      $email = $keyarray['payer_email'];
      $status = $keyarray['payment_status'];  # Completed or Pending
      
      $values = "'".mysql_real_escape_string($tx_token)."', ";
      $values .= $status == 'Completed'? "TRUE, " : "FALSE, ";
      $values .= mysql_real_escape_string($amount).", ".
        mysql_real_escape_string($fee).", ".
        mysql_real_escape_string($ps3 * ($amount - $fee) / 100).", ".
        mysql_real_escape_string($sgt * ($amount - $fee) / 100).", ".
        mysql_real_escape_string($eff * ($amount - $fee) / 100).", ".
        mysql_real_escape_string($ps3).", ".
        mysql_real_escape_string($sgt).", ".
        mysql_real_escape_string($eff).", ".
        "'".mysql_real_escape_string($donor)."'";
      $ret = mysql_query("INSERT INTO donations (transaction_id, completed, amount, fee, ".
                         "ps3, sgt, eff, ps3_p, sgt_p, eff_p, name) VALUES (".
                         $values.");", $con);
      if ($ret) {
        $msg = "Received donation for token ". $tx_token . "\n".
          "Data received was : \n" . $res . "\n\n".
          "Database info to insert : \n". $values."\n\n";
        $msg = wordwrap($msg, 70);
        mail($PAYPAL_SUCCESS_DESTINATION, "Received donation of : ".$amount."$USD", $msg);
      } else {
        $query = "SELECT * FROM donations WHERE transaction_id = '". mysql_real_escape_string($tx_token)."';";
        $result = mysql_query($query, $con);
        $msg = ": Error inserting transaction in database for transaction ". $tx_token . "\n".
          "Data received was : \n" . $res . "\n\n".
          "Database info to insert : \n". $values . "\n\n".
          "Returned : ".($ret?"true":"false")."\n".
          "Database info present : ". (mysql_num_rows($result) > 0 ? "yes":"no") . "\n";
        if (mysql_num_rows($result)) {
          $row = mysql_fetch_assoc($result);
          $msg .= "Transaction id : ". $row['transaction_id'] . "\n".
            "Completed : ". $row['completed'] . "\n".
            "Amount : ". $row['amount'] . "\n".
            "Fee : ". $row['fee'] . "\n".
            "PS3 : ". $row['ps3'] . "\n".
            "SGT : ". $row['sgt'] . "\n".
            "EFF : ". $row['eff'] . "\n".
            "PS3 %age : ". $row['ps3_p'] . "\n".
            "SGT %age : ". $row['sgt_p'] . "\n".
            "EFF %age: ". $row['eff_p'] . "\n".
            "Donor name : ". $row['name'] . "\n";
        }
        $msg = wordwrap($msg, 70);
        mail($PAYPAL_ERROR_DESTINATION, "Error inserting transaction in database : ".$tx_token, $msg);
      }
      
      $completed = true;
    } else if (strcmp ($lines[0], "FAIL") == 0) {
      $completed = false;
    } else {
      $completed = false;
    }
    

    if ($completed == false) {
      $msg = "Unable to get transaction information from paypal, transaction was : ". $tx_token . "\n".
        "Send request : \n". $req ."\n\n".
        "Data received was : \n".
        $headers . "\n\n" . $res;
      $msg = wordwrap($msg, 70);
      mail($PAYPAL_ERROR_DESTINATION, "Error processing Paypal Transaction ".$tx_token, $msg);
    }

  }
}

mysql_close($con);

// Redirect
header("Location: index.php?".
       "donated=".($completed?"1":"0").
       "&first_name=".urlencode($first_name).
       "&last_name=".urlencode($last_name).
       "&email=".urlencode($email).
       "&amount=".urlencode($amount).
       "&sgt=".urlencode($sgt).
       "&ps3=".urlencode($ps3).
       "&eff=".urlencode($eff).
       "&donor=".urlencode($donor).
       "#donate");

?>
