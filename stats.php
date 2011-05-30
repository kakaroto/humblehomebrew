            <tr>
              <td height="50">&nbsp;
                
              </td>
            </tr>
            <tr>
              <td align="center" valign="top">
                <table width="70%" border="0" cellpadding="0" cellspacing="0" class="shadow">
                  <tr>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="engrave">
                      <p class="engrave style46 style6">
                        Stats:
                      </p>
                      <hr align="center" width="90%" />
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="engrave">
                      <table width="80%" border="0" cellpadding="00" cellspacing="0">
                        <tr>
                          <td width="40%" height="100%" align="center" valign="middle">
                            <table width="100%" height="100%" align="center" valign="middle">
                              <?php
                                 list($total_amount, $total_donations, $average_donation, $total_signatures,
                                      $total_downloads) = get_short_statistics($con);
                              ?>
                              <tr>
                                <td class="style1">
                                  <div align="center" class="engrave style5">
                                    <strong>Amount Raised</strong>
                                </div>
                                </td>
                                <td class="style1">
                                  <div align="center">
                                    <?php echo $total_amount; ?>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="style1">
                                  <div align="center" class="engrave style5">
                                    <strong>Average Donation</strong>
                                  </div>
                                </td>
                                <td class="style1">
                                  <div align="center">
                                    <?php echo $average_donation; ?>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="style1">
                                  <div align="center" class="engrave style5">
                                    <strong>Total Donations</strong>
                                  </div>
                                </td>
                                <td class="style1">
                                  <div align="center" class="style1">
                                    <?php echo $total_donations; ?>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="style1">
                                  <div align="center" class="engrave style5">
                                    <strong>Signatures</strong>
                                  </div>
                                </td>
                                <td class="style1">
                                  <div align="center">
                                    <?php echo $total_signatures; ?>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="style1">
                                  <div align="center" class="engrave style5">
                                    <strong>Total Downloads</strong>
                                </div>
                                </td>
                                <td class="style1">
                                  <div align="center">
                                    <?php echo $total_downloads; ?>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                          <td width="60%" align="center" valign="top">
                            <div align="center" class="style1">
                              <p>
                                <strong>
                                  Top Donators:
                                </strong>
                              </p>
                              <p class="style3">
                                <span class="style1">
                                  <table height="100%" width="100%" align="center">
                                    <?php
    				       $counter = 1;
  				       $query = "SELECT name, amount FROM donations ORDER BY amount DESC LIMIT 10";
    				       $result = mysql_query($query);
				       while ($counter <= 10 && $row = mysql_fetch_array($result)) {
                                            $name = $row['name'];
                                            if ($name == "")
                                               $name = "Anonymous*";
                                            echo "<tr><td align=\"right\"> <strong>" . $counter . ".&nbsp;</strong> </td>";
                                            echo "<td align=\"left\"><spanclass=\"style5\"> &nbsp;". htmlspecialchars($name) ."</span></td>";
                                            printf("<td align=\"right\">&nbsp;\$ %.2f USD </td></tr>", $row['amount']);
                                            $counter++;
                                        }
        			    ?>
                                  </table>
                                </span>
                              </p>
                            </div>
                          </td>
                        </tr>
                      </table>
                      <hr align="center" width="90%" />
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="engrave">
                      <p class="engrave style6">
                        <table width="100%">
                          <tr>
                            <td width="33%" align="center">
                              <a href="soon.php">More statistics</a>
                            </td>
                            <td width="33%" align="center">
                              <a href="soon.php">View all petition signatures</a>
                            </td>
                            <td width="33%" align="center">
                              <a href="soon.php">View all donors</a>
                            </td>
                          </tr>
                        </table>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF" class="engrave">
                      <p>&nbsp;</p>
                    <p>&nbsp;</p></td>
                  </tr>
                </table>
              </td>
            </tr>
