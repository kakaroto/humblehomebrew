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


$SCOGGER_PS3_3_55_URL = "http://www.megaupload.com/?d=5BS6ZZIM";
$SCOGGER_PS3_3_41_URL = "http://www.megaupload.com/?d=DNAGL86Q";
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
$DEFAULT_VALUES['comment'] = "Dear SCE,\n".
 "\n".
 "As a loyal customer, I am devastated by your reaction to the homebrew\n".
 "community. These people are not a threat to your business in any way.\n".
 "The biggest threat you could ever face is losing the loyalty of users\n".
 "who have supported you since 1994. It is in Computer Entertainment\'s\n".
 "best interest to look at its rivals' tactics and encourage the\n".
 "development of consumer-generated games.\n".
 "\n".
 "Recent actions by SCE have tarnished the brand, your reputation, and\n".
 "disturbed the loyalty of your fans. Those actions include the removal\n".
 "of an advertised feature (OtherOS) and unlawful and abusive lawsuits;\n".
 "coupled with the scare tactics you tried to use against the community\n".
 "that supports and defends you. Also, the ridiculous claims that the\n".
 "hardware you have sold is still your property, even after you have\n".
 "happily taken our hard-earned money. It is time to step up and fix\n".
 "your wrongdoings, before it is too late.\n".
 "\n".
 "Our desire is simple: a legitimate and free method of running homebrew\n".
 "applications on our Playstation 3 systems. By accepting and embracing\n".
 "the homebrew community, you will regain a great deal of trust and the\n".
 "respect of gamers all over the world. We desire a free SDK geared\n".
 "toward homebrew development, and a free method of running and\n".
 "distributing non-commercial applications. Applications that can run\n".
 "without restrictions, on the hardware that we rightfully own.\n".
 "\n".
 "Apple (App Store), Microsoft (Xbox Live Indie Games), and Google\n".
 "(Android Market) have already embraced homebrew development and\n".
 "fulfill the need for community-driven games. As a result, they are\n".
 "generating huge revenues with meager investment.\n".
"\n".
 "SCE\'s actions have left many of us uneasy and, in some cases,\n".
 "ashamed. That said, if you do make the effort to support home-grown\n".
 "developers, we will stand for and continue to support you wherever we\n".
 "can.\n".
 "\n".
 "Respectfully,\n";



$PETITION_DESTINATION = "test_signatures@humblehomebrew.com";


function get_petition_destination() {
  return "Sony, SCEA, SCEE, SCEJ, SNEA, Playstation";
}

function get_petition_subject() {
  return "Requesting Homebrew support for the Playstation 3";
}

?>
