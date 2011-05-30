
                  <tr>
                    <td align="center" valign="top" bgcolor="#FFFFFF">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="39%" align="left" valign="top" class="engrave style4 style5">                          </td>
                        </tr>
                        <tr id="donate">
                          <td>
                            <hr align="center" width="90%" />
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td align="center">
                            <p class="style6">
                              <strong>
                                <span class="style6">&nbsp; 1. Donate</span>
                              </strong>
                            </p>
                          </td>
                          <td>
                            <?php check_donated(); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p align="right" class="style6">
                              <span class="style6"> Total amount : </span>
                            </p>
                          </td>
                          <td width="61%" align="left" valign="center">
                            <table>
                              <tr>
                                <td>
                                  <span class="style6">
                                    <input name="donateamount" class="style6" type="text" class="stylenumber" id="donateamount" onkeyup="updateTotal(this.value)" value="<?php echo htmlspecialchars(get_value('amount')); ?>" />
                                  </span>
                                </td>
                                <td>
                                  $USD
                                </td>
                                <td>
                                  <div id="donate_error" style="color: #FF0000;" align="center"> </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p align="right" class="style6">
                              <span class="style6"> Donor name &nbsp;&nbsp;<span class="style70"><br/>
                                  (To be shown in the <a href="soon.php">donors list</a>)</span> : </span>
                            </p>
                          </td>
                          <td width="61%" align="left" valign="center">
                            <table>
                              <tr>
                                <td>
                                  <span class="style6">
                                    <input name="donor" class="style6" type="text" id="donor" maxlength="35" onkeyup="updateDonorName(this.value)" value="<?php echo htmlspecialchars(get_value('donor')); ?>" />
                                  </span>
                                </td>
                              </tr>
                            </table>
                          </td>
                          <td>
                          </td>
                        </tr>
                        <tr>
                          <td height="20"><span class="style6">&nbsp</span></td>
                        </tr>
                        <p> &nbsp;
                          <script src="dhtmlxslider_full.js" type="text/javascript"></script>
                          <link rel="stylesheet" type="text/css" href="dhtmlxslider_full.css" />
                          <script src="hhc.js" type="text/javascript"></script>
                          <script>
                                     function get_sgt_value() {
                                        return <?php echo get_sgt_value(); ?>;
                                     };
                                     function get_ps3_value() {
                                        return <?php echo get_ps3_value(); ?>;
                                     };
                                     function get_eff_value() {
                                        return <?php echo get_eff_value(); ?>;
                                     };
                                     dhtmlxEvent (window, "load", init_sliders);
                          </script>
                        </p>
                        <tr>
                          <td>
                            <p align="right" class="style6">
                              Amount to send to the original game's developer :
                            </p>
                          </td>
                          <td>
                            <table>
                              <tr>
                                <td>
                                  <div align="center">
                                    <img src="Images/puzzles.png" alt="puzzles" width="50" height="50" />
                                  </div>
                                </td>
                                <td>
                                  <div id="sgt_amount"> </div>
                                </td>
                                <td width="50">
                                  <input type="text" id="sgt" style="width:50px; margin:10px;" value="0" disabled="disabled" />
                                </td>
                                <td class="style6">$USD</td>
                                <td>
                                  <div align="center">
                                    <span class="style6">
                                      <input name="allpuzzle" type="submit" class="style3" id="allpuzzle" value="All"  onClick="sgt_slider_changed(100)"/>
                                    </span>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p align="right" class="style6">
                              Amount to send to the PS3 Port developer :
                            </p>
                          </td>
                          <td>
                            <table>
                              <tr>
                                <td>
                                  <div align="center">
                                    <img src="Images/ps3.png" alt="ps3" width="50" height="50" />
                                  </div>
                                </td>
                                <td>
                                  <div id="ps3_amount"></div>
                                </td>
                                <td width="50">
                                  <input type="text" id="ps3" style="width:50px; margin:10px;" value="0" disabled="disabled" />
                                </td>
                                <td class="style6">$USD</td>
                                <td>
                                  <div align="center">
                                    <span class="style6">
                                      <input name="allps3"type="submit" class="style3" id="allps3" value="All" onClick="ps3_slider_changed(100)"/>
                                    </span>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p align="right" class="style6">
                              Amount to send to the EFF :
                            </p>
                          </td>
                          <td>
                            <table>
                              <tr>
                                <td>
                                  <div align="center">
                                    <img id="eff_img" src="Images/eff.png" alt="eff" width="50" height="34" />
                                  </div>
                                </td>
                                <td height="50">
                                  <div id="eff_amount"></div>
                                </td>
                                <td width="50">
                                  <input type="text" id="eff" style="width:50px; margin:10px;" value="0" disabled="disabled" />
                                </td>
                                <td class="style6">$USD</td>
                                <td>
                                  <div align="center">
                                    <span class="style6">
                                        <input name="alleff" type="submit" class="style3" id="alleff" value="All" onClick="eff_slider_changed(100)"/>
                                    </span>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td align="left">
                            <p align="left">
                              <?php echo $PAYPAL_FORM;?>
                            </p>
                          </td>
                        </tr>
