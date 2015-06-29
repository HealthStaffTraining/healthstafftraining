<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="jf_admin_wrap">
    <h2><span class="dashicons dashicons-welcome-widgets-menus"></span> Welcome to JF Form</h2>
    <p>This plugin puts a lead form on your website. View the installation instructions below.</p>
    <h2><span class="dashicons dashicons-info"></span> Installation</h2>
    <ol>
        <li>You can embed your form into the content of your wordpress page using the shortcode [jf_form]<br><br>
            You can also place the form into your template by using the code &lt;?php echo do_shortcode( '[jf_form]' ); ?&gt;</li>
        <li>You will then need to create a page which does the form handling. Call this page form_cgi. It should use the permalink /form_cgi<br>
            Use the short code [form_cgi] in the content body of this page.</li>
        <li>Finally create a page and call it thank you. It should use the permalink /thank-you<br>This is the page the form lands on post submission</li>
        <li><b>NOTE:</b> If the relocation from the form_cgi page to the thank you page is not working, apply a blank template to the form_cgi page. This should fix the problem.</li>
        <li><b class="jf_red">IMPORTANT!</b> Fill in the fields below.</li>
    </ol>
    <h2><span class="dashicons dashicons-admin-generic"></span> Configuration</h2>
    <div id="jf_admin_form">
    <form method="post" action="#">
        <div id="joe_form_err"></div>
        <h3>Form Name</h3>
        <p class="jf_examples">Example: Nuovometo Contact</p>
        <div id="joe_bare_form_row">
            <input type="text" name="formName" id="formName" value="<?php echo $formName; ?>" maxlength="50" onkeyup="insertFormName(this)" style="width: 80%;"> <button type="button" class="fakeButton">Update</button>
        </div>
        <h3>Recipient List</h3>
        <p class="jf_examples">A comma separated list of email addresses. Example: joe@test.com,steve@test.com,jillian@test.com<br>If empty, no email notification will be sent.</p>
        <div id="joe_bare_form_row">
            <input type="text" name="formName" id="formName" value="<?php echo $recipients; ?>" maxlength="250" onkeyup="insertRecipients(this)" style="width: 80%;"> <button type="button" class="fakeButton">Update</button>
        </div>
    </form>
    </div>
    <p>&nbsp;<br>&nbsp;</p>
</div>