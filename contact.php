<?php include 'header.php'; ?>

      <tr>
        <td align="center" valign="top">
          <table width="70%" border="0" cellpadding="0" cellspacing="0" class="shadow">
            <tr>
              <td align="center" valign="top" bgcolor="#FFFFFF" class="engrave style42">
                <p align="center">
                  <br />
                  <strong>
                    <span class="style74">
                      Contact us
                    </span>
                  </strong>
                  <br />
                </p>
                <p align="center">
                  <?php $success = check_emailed();?>
                </p>
                <p align="center">
                  You may contact us for any questions or inquiries by sending an email to : <br/>
                  <a href="mailto:contact@humblehomebrew.com">contact@humblehomebrew.com</a> <br/>
                  Or you can use the form below to contact us directly.<br/>
                  Please avoid asking questions that are unrelated to the current petition and homebrew
                  offered through this website. <br/>
                  Any unrelated question will probably not be answered.</br>
                </p>
                <div align="center" class="style42">
                  <form method='post' action='contact.php'>
		    <table>
		      <tr>
  			<td> <label for='email'>Your e-mail:</label>  </td>
			<td> <input name='email' size='50' type='text' id='email' value="<?php if (!$success) { echo htmlspecialchars(get_value('email'));} ?>" /> </td>
		      </tr>
  		      <tr>
			<td size='50'> <label for='subject'>Subject:</label></td>
			<td> <input name='subject' size='50' type='text' id='subject' value="<?php if (!$success) { echo htmlspecialchars(get_value('subject'));} ?>" /></td>
		      </tr>
		      <tr>
			<td size='50'> <label for='tx'> Message:</label></td>
			<td>
                          <textarea name='message' rows='30' cols='50' id='tx'><?php if (!$success) { echo htmlspecialchars(get_value('message'));} ?></textarea>
                        <td />
		      </tr>
		    </table>
		    <input type='submit' value='Send' />
		  </form>
                </div>
              </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" class="engrave style42">&nbsp;
                
              </td>
            </tr>
          </table>

<?php include 'footer.php' ?>
