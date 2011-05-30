   
                        <tr id="petition">
                          <td align="left" valign="top" class="engrave style6">
                            <div align="center" class="style6">
                              <hr align="center" width="90%" />
                            </div>
                          </td>
                          <td>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">
                            <div class="style6">
                              <strong>
                                <span class="style6">&nbsp; 2. Sign the Petition </span>
                              </strong>
                              <br/>
                              <span class="style6"> (Required marked with *) </span>
                          </div>
                          </td>
                          <td align="left" valign="top">
                            <?php check_signed(); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                          </td>
                          <td>
                            <p align="center" class="style6">
                              <div>
                                <span class="style6">
                                  Your e-mail will not be shared publicly
                                  but will be seen by Sony.<br/>
                                </span>
                                <span class="style6" style="color: #FF0000;">
                                  <strong>
                                    If you do not want Sony to see your email, you can sign it anonymously
                                    and your name/email will not appear to Sony. See our <a href="disclaimer.php">Privacy Policy</a>.
                                  </strong>
                              </span>
                              </div>
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td>
                            <div id="petition_error" style="color: #FF0000;" align="center"> </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">First Name: </span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="fname" type="text" class="style6" id="fname" size="30" value="<?php echo htmlspecialchars(get_value('first_name')); ?>" />
                                  </span>
                                </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">Last Name: </span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="lname" type="text" class="style6" id="lname" size="30" value="<?php echo htmlspecialchars(get_value('last_name')); ?>" />
                                  </span>
                                </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">*E-mail Address: </span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left" class="style6">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="email" type="text" class="style6" id="email" size="30" value="<?php echo htmlspecialchars(get_value('email')); ?>" />
                                  </span>
                                </div>
                              </td>
                              <td>
                                 <div id="email_error" style="color: #FF0000;" align="center"> </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">How much would you pay for this app if it was on PSN? </span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="paygame" type="text" class="style6" id="paygame" size="10" value="<?php echo htmlspecialchars(get_amount_psn()); ?>" />$USD
                                  </span>
                                </div>
                              </td>
                              <td>
                                 <div id="paygame_error" style="color: #FF0000;" align="center"> </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">How much would you pay to have your rights defended? </span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="payrights" type="text" class="style6" id="payrights" size="10" value="<?php echo htmlspecialchars(get_amount_rights()); ?>" />$USD
                                  </span>
                                </div>
                              </td>
                              <td>
                                 <div id="payrights_error" style="color: #FF0000;" align="center"> </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">To :</span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="to" type="text" id="to" size="50" value="<?php echo htmlspecialchars(get_petition_destination()); ?>" disabled="disabled" />
                                  </span>
                                </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">Subject :</span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <input name="subject" type="text" id="subject" size="50" value="<?php echo htmlspecialchars(get_petition_subject()); ?>" disabled="disabled" />
                                  </span>
                                </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div align="right" class="style6">
                              <span class="style6">Message to Sony: </span>
                            </div>
                          </td>
                          <td>
                            <table>
                              <td>
                                <div align="left">
                                  <span class="style6" valign="center"> &nbsp;
                                    <textarea name="comment" cols="50" rows="15" class="style6" id="comment" onkeyup="updateCommentCounter()"><?php echo htmlspecialchars(get_value('comment')); ?></textarea>
                                  </span>
                                </div>
                              </td>
                              <td>
                                 <div id="comment_error" style="color: #FF0000;" align="center"> </div>
                              </td>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td> </td>
                          <td>
                            <div align="left">
                              <input type="text" id="comment_counter" style="width:50px; margin:10px;" value="0" disabled="disabled" />
                              Characters left
                            </div>
                          </td>
                        <tr>
                          <td> </td>
                          <td>
                            <div align="left" class="style6">
                              <span class="style6">&nbsp;Sign Anonymously</span>
                              <input type="checkbox" id="anonymous" name="anomynous"  value="1" <?php if (get_value('anonymous')) echo "CHECKED"; ?>/>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td align="left">
                            <form name="petition" action="sign.php" method="post">
                              <input type="hidden" name="fname" value="">
                              <input type="hidden" name="lname" value="">
                              <input type="hidden" name="email" value="">
                              <input type="hidden" name="comment" value="">
                              <input type="hidden" name="paygame" value="">
                              <input type="hidden" name="payrights" value="">
                              <input type="hidden" name="anonymous" value="">
                            </form>
                            &nbsp;
                            <input type="submit" name="submitPetition" value="Sign the Petition" onClick="signPetition();" />
                          </td>
                        </tr>
