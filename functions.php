<?php

require_once 'config.php';

function get_sgt_value()
{
  global $DEFAULT_VALUES;

  if (isset($_REQUEST['sgt']) && is_numeric($_REQUEST['sgt']))
    return $_REQUEST['sgt'];
  else
    return $DEFAULT_VALUES['sgt'];
}

function get_ps3_value()
{
  global $DEFAULT_VALUES;

  if (isset($_REQUEST['ps3']) && is_numeric($_REQUEST['ps3']))
    return $_REQUEST['ps3'];
  else
    return $DEFAULT_VALUES['ps3'];
}


function get_eff_value()
{
  global $DEFAULT_VALUES;

  if (isset($_REQUEST['eff']) && is_numeric($_REQUEST['eff']))
    return $_REQUEST['eff'];
  else
    return $DEFAULT_VALUES['eff'];
}

function get_value($key) {

  global $DEFAULT_VALUES;

  if (isset($_REQUEST[$key]) && is_string($_REQUEST[$key]))
    return $_REQUEST[$key];
  else if (isset($DEFAULT_VALUES[$key]))
    return $DEFAULT_VALUES[$key];
  else
    return '';
}


function get_amount_psn()
{
  $paygame = get_value('paygame');
  if ($paygame == '') {
    $amount = get_value('amount');
    $eff = get_eff_value();

    if ($amount == '')
      return '';
    return $amount - ($amount * $eff / 100);
  } else {
    return $paygame;
  }
}

function get_amount_rights()
{
  $payrights = get_value('payrights');
  if ($payrights == '') {
    $amount = get_value('amount');
    $eff = get_eff_value();

    if ($amount == '')
      return '';
    return $amount * $eff / 100;
  } else {
    return $payrights;
  }
}

function check_donated()
{

  if (!isset($_REQUEST['donated']) || $_REQUEST['donated'] != "1")
    return;

  include "donate_thanks.html";

}

function check_signed()
{

  if (!isset($_REQUEST['signed']))
    return;

  if ($_REQUEST['signed'] == "1")
    include "sign_thanks.html";
  else 
    include "sign_error.html";
}

function check_emailed()
{
  global $CONTACT_DESTINATION;

  $result_box = "<table width=\"50%%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"shadow\">".
    "<tr>".
    "<td align=\"center\" valign=\"top\" bgcolor=\"#CCCCCC\" class=\"engrave\">".
    "<p class=\"style6 style1\">".
    "%s".
    "</p>".
    "</td>".
    "</tr>".
    "</table>";

  if (isset($_REQUEST['email']) && is_string($_REQUEST['email'])) {
    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL) || eregi("(\r|\n)", $email)) {
      if (isset($_REQUEST['message']) && is_string($_REQUEST['message']) && strlen($_REQUEST['message']) > 50) {
        if (isset($_REQUEST['subject']) && is_string($_REQUEST['subject']) && strlen($_REQUEST['subject']) > 0) {
          $subject = "HumbleHomebrewCollection: " . $_REQUEST['subject'];
          $message = $_REQUEST['message'] . "\n\nSent from " . $_SERVER['REMOTE_ADDR'];
          $message = wordwrap($message, 70);
          if (mail($CONTACT_DESTINATION, $subject, $message, "From: $email" )) {
            printf($result_box, "Thank you for submitting your question, we will answer you as soon as possible.");
            return true;
          } else {
            printf($result_box, "Unable to send message, please try again");
          }
        } else {
          printf($result_box, "Invalid subject");
        }
      } else {
        printf($result_box, "Invalid message");
      }
    } else {
      printf($result_box, "Invalid email address");
    }
  } else {
    printf($result_box, "Invalid email address");
  }

  return false;
}

function get_short_statistics($con)
{

  $result = mysql_query("SELECT SUM(amount) AS total_amount, COUNT(transaction_id) AS total_donations FROM donations", $con);
  if ($result) {
    $row = mysql_fetch_assoc($result);
    $total_amount = sprintf("\$ %.2f USD", $row['total_amount']);
    $total_donations = $row['total_donations'];
    $average_donation = "\$ 0.00 USD";
    if ($total_donations > 0) {
      $average_donation = $row['total_amount'] / $total_donations;
      $average_donation = sprintf("\$ %.2f USD", $average_donation);
    }
  } else {
    $total_amount = $total_donations = $average_donation = "Error accessing database";
  }

  $result = mysql_query("SELECT COUNT(id) FROM signatures",$con);
  if ($result) {
    $row = mysql_fetch_row($result);
    $total_signatures = $row[0];
  } else {
    $total_signatures = "Error accessing database";
  }

  $result = mysql_query("SELECT COUNT(DISTINCT ip) FROM downloads",$con);
  if ($result) {
    $row = mysql_fetch_row($result);
    $total_downloads = $row[0];
  } else {
    $total_downloads = "Error accessing database";
  }

  return array($total_amount, $total_donations, $average_donation, $total_signatures, $total_downloads);
}

?>