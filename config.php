<?php

$MYSQL_SERVER = "localhost";
$MYSQL_USERNAME = "humbleho_test";
$MYSQL_PASSWORD = "Rn?FqwZER,Bu";
$MYSQL_DATABASE = "humbleho_bundle";

$FHEROES2_PS3_3_55_URL = "http://www.megaupload.com/?d=KVZI64EH";
$FHEROES2_PS3_3_41_URL = "http://www.megaupload.com/?d=HQB2HYQ0";
$FHEROES2_ANDROID_URL = "https://market.android.com/details?id=net.sourceforge.fheroes2";
$FHEROES2_WINDOWS_URL = "http://sourceforge.net/projects/fheroes2/files/fheroes2/fheroes2-20110526-win32-r2356.zip/download";
$FHEROES2_LINUX_URL = "http://sourceforge.net/projects/fheroes2/files/fheroes2/fheroes2-20110526-linux-r2356.tar.gz/download";
$FHEROES2_SOURCE_URL = "http://git-hacks.com/humblehomebrew/fheroes2";

$SGTPUZZLES_PS3_3_55_URL = "http://www.multiupload.com/7XJ2AFI53I";
$SGTPUZZLES_PS3_3_41_URL = "http://www.multiupload.com/Y0OEG3Y800";
$SGTPUZZLES_ANDROID_URL = "http://chris.boyle.name/projects/android-puzzles/";
$SGTPUZZLES_WINDOWS_URL = "http://www.chiark.greenend.org.uk/~sgtatham/puzzles/puzzles.zip";
$SGTPUZZLES_MAC_URL = "http://www.chiark.greenend.org.uk/~sgtatham/puzzles/Puzzles.dmg";
$SGTPUZZLES_LINUX_URL = "download-sgtpuzzles.php?linux=1";
$SGTPUZZLES_SOURCE_URL = "http://git-hacks.com/humblehomebrew/sgtpuzzles";


$SCOGGER_PS3_3_55_URL = "";
$SCOGGER_PS3_3_41_URL = "";
$SCOGGER_HOME_URL = "http://scognito.drunkencoders.com/projects/scogger.php";

$HUMBLE_SOURCE_URL = "http://git-hacks.com/humblehomebrew";

$PAYPAL_IDENTITY_TOKEN = "SxkGDvbwRvA7fecKZIUuFulVKs5MbpIBO7sTnsEs1SQ3zXmIBuri0LlSVim";
$PAYPAL_ENVIRONMENT = "sandbox.";

$PAYPAL_FORM = 
  '<form name="paypalform" action="https://www.paypal.com/cgi-bin/webscr" method="post">
     <input type="hidden" name="cmd" value="_donations">
     <input type="hidden" name="business" value="MTJNZJEAPA5AJ">
     <input type="hidden" name="lc" value="CA">
     <input type="hidden" name="item_name" value="Humble Homebrew Collection">
     <input type="hidden" name="amount"  id="paypalamount" value="0.00">
     <input type="hidden" name="currency_code" value="USD">
     <input type="hidden" name="no_note" value="1">
     <input type="hidden" name="no_shipping" value="1">
     <input type="hidden" name="rm" value="1">
     <input type="hidden" name="return" value="http://humblehomebrew.com/paypal.php">
     <input type="hidden" name="cancel_return" id="paypalcancel" value="http://humblehomebrew.com/index.php">
     <input type="hidden" name="currency_code" value="USD">
     <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
     <input type="hidden" name="custom" id="paypalcustom" value="">
     <a href="javascript: submitPaypal()">
     <img src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!">
     </a>
     <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/scr/pixel.gif" width="1" height="1">
  </form>';


$PAYPAL_ERROR_DESTINATION = "paypal_errors@humblehomebrew.com";
$PAYPAL_SUCCESS_DESTINATION = "paypal@humblehomebrew.com";

$CONTACT_DESTINATION = "contact@humblehomebrew.com";

$DEFAULT_VALUES['sgt'] = 40;
$DEFAULT_VALUES['ps3'] = 40;
$DEFAULT_VALUES['eff'] = 20;
$DEFAULT_VALUES['donor'] = "Anonymous";
$DEFAULT_VALUES['comment'] = "Dear Playstation,\n".
  "\n".
  "As a loyal customer to your brand, I am disappointed in your reaction to the Homebrew Community. ".
  "You must know that the homebrew community is not a threat to your business model in any way and that ".
  "the biggest threat you could ever face is lost loyalty of the users who have supported you.\n".
  "\n".
  "Recent actions towards your customers, whether it is the removal of an advertised feature (OtherOS) ".
  "without any consideration of your previous promises; Or your unlawful and abusive lawsuits, coupled with ".
  "all the scare tactics that you tried to use against the community that supports you; Or your ridiculous ".
  "claims that the hardware you have sold is still your property even after you happily took our hard-earned money; ".
  "Or the recent loss of personal information of nearly 100 million of your customers, has tarnished your brand, ".
  "your reputation and the loyalty of your fans. It is now time for you to step up and fix your previous ".
  "wrongdoings before it is too late.\n".
  "\n".
  "We hereby request from you, that you provide us with a legitimate and free method of running homebrew applications ".
  "on our Playstation 3 systems. By accepting and embracing the homebrew community, you will gain back trust, and you ".
  "will be respected again by gamers all over the world. We request a free SDK and a free method of running and ".
  "distributing non-commercial applications that can run without restrictions, on the hardware that we rightfully own.\n".
  "\n".
  "Apple (App Store), Microsoft (Xbox Live Indie Games), and Google (Android Market) have already embraced the homebrew ".
  "community and fill this need for community driven games. As a result, they are generating huge revenues with ".
  " absolutely no investment required from their part.\n".
  "\n".
  "Thank you.\n";

$PETITION_DESTINATION = "test_signatures@humblehomebrew.com";


function get_petition_destination() {
  return "Sony, SCEA, SCEE, SCEJ, SNEA, Playstation";
}

function get_petition_subject() {
  return "Requesting Homebrew support for the Playstation 3";
}

?>
