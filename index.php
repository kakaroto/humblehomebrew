<?php 
   include 'header.php';
   include 'about.html';
   include 'stats.php';
?>

            <tr>
              <td height="50">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">
                <table width="70%" border="0" cellpadding="0" cellspacing="0" class="shadow">
                  <tr>
                    <td align="center" valign="top" bgcolor="#FFFFFF">
                      <div align="center" class="style29">
                        <p class="style35">
                          You choose!
                        </p>
                      </div>
                      <div align="center" class="style46">
                        <p class="style35">
                          <div style="color: #FF0000;">
                            You may donate, sign the petition OR download the game, you don't need to donate to sign, and you don't need to sign to download. The choice is yours, but signing the petition would help the community.
                          </div>
                        </p>
                    </td>
                  </tr>

<?php include 'donate.php'; ?>
<?php include 'petition.php'; ?>

                        <tr>
                          <td align="left" valign="top" height="20" class="engrave style4 style5">
                            <div align="center" class="style29">
                              <hr align="center" width="90%" />
                          </td>
                          <td>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">
                            <p class="style6">
                              <strong>
                                <span class="style6" id="download">&nbsp; 3. Download! </span>
                              </strong>
                            </p>
                          </td>
                          <td align="left">
                            <form id="form3" name="form1" method="post" action="download.php">
                              <div valign="center">
                                &nbsp;
                                <input name="download1" type="submit" id="download1" value="Download" />
                              </div>
                            </form>
                            <p align="center" class="style6"></p>
                            <p align="center" class="style6"></p>
                            <p align="center" class="style6"></p>
                            <p align="center" class="style6"></p>
                            <p align="center" class="style6"></p>
                            <p align="center" class="style6"></p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>

<?php  include 'footer.php'; ?>
