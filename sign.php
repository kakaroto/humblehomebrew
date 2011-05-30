<?php

require_once 'dbc.php';
require_once "config.php";
require_once "functions.php";

$fname = get_value('fname');
$lname = get_value('lname');
$email = get_value('email');
$comment = get_value('comment');
$paygame = get_amount_psn();
$payrights = get_amount_rights();
$anonymous = get_value('anonymous');
$signed = 1;

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  $signed = 0;
if ($anonymous != "0" && $anonymous != "1")
  $signed = 0;
if (!is_numeric($paygame) || $paygame < 0 || !is_numeric($payrights) || $payrights < 0)
  $signed = 0;
if (strlen($comment) < 50 || strlen($comment) > 5000)
  $signed = 0;
// Avoid header injection
if (eregi("(\r|\n)", $fname) || eregi("(\r|\n)", $lname) || eregi("(\r|\n)", $email)) 
  $signed = 0;

if ($signed) {
  $result = mysql_query ("SELECT email FROM signatures where email = '".mysql_real_escape_string($email)."'");
  if (mysql_num_rows($result) > 0) {
    $signed = 1;
  } else {
    if ($anonymous) {
      $id = "";
      $result = mysql_query("SELECT COUNT(id) FROM signatures", $con);
      if ($result) {
        $row = mysql_fetch_row($result);
        $id = $row[0] + 1;
      }
      $from = "PS3 User ".$id." <anonymous@humblehomebrew.com>";
    } else {
      $from = $fname." ".$lname." <".$email.">";
    }
    $bcc = "signatures@humblehomebrew.com, ".$email;
 
    // Fix any bare linefeeds in the message to make it RFC821 Compliant. 
    $message = preg_replace("#(?<!\r)\n#si", "\r\n", $message);
    // mail requires max 70 chars per line
    $message = wordwrap($comment, 70);
    $mailed = mail($PETITION_DESTINATION, get_petition_subject(),
                   $message, "BCC: ".$bcc."\nFrom: ".$from);

    $values = "'".mysql_real_escape_string($fname)."', ".
      "'".mysql_real_escape_string($lname)."', ".
      "'".mysql_real_escape_string($email)."', ".
      "'".mysql_real_escape_string($comment)."', ".
      "'".mysql_real_escape_string($paygame)."', ".
      "'".mysql_real_escape_string($payrights)."', ";
    $values .= $anonymous? "TRUE, " : "FALSE, ";
    $values .= $mailed? "TRUE" : "FALSE";

    $signed = mysql_query("INSERT INTO signatures (fname, lname, email, comment, ".
                          "game, rights, anonymous, mailed) VALUES (".$values.")", $con);
  }
}

mysql_close($con);

header("Location: index.php?".
       "signed=".($signed?"1":"0").
       "&first_name=".urlencode($fname).
       "&last_name=".urlencode($lname).
       "&email=".urlencode($email).
       "&comment=".urlencode($comment).
       "&paygame=".urlencode($paygame).
       "&payrights=".urlencode($payrights).
       "&anonymous=".urlencode($anonymous).
       "#petition");

?>