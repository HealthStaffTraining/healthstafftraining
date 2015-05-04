<div id="joe_bare_form_contain">
    <div id="joe_bare_form_mobile">
        <div class="joe_bare_form_title"><?php echo $formName; ?></div>
        <div id="joe_form_err"></div>
        <div id="joe_bare_form_row">
            <input type="text" name="firstName" id="firstName" class="jf_required" size="10" value="First Name" maxlength="50" onclick="clearFields(this)" onblur="repopulate(this,'First Name')" onkeyup="fillFields(this)">
        </div>
        <div id="joe_bare_form_row">
            <input type="text" name="lastName" id="lastName" class="jf_required" size="10" value="Last Name" maxlength="50" onclick="clearFields(this)" onblur="repopulate(this,'Last Name')">
        </div>
        <div id="joe_bare_form_row">
            <input type="text" name="email" id="email" class="jf_required" size="10" value="Email" maxlength="100" onclick="clearFields(this)" onblur="repopulate(this,'Email')">
        </div>
        <div id="joe_bare_form_row">
            <input type="text" name="phone" id="phone" class="jf_required" size="10" value="Phone" maxlength="20" onclick="clearFields(this)" onblur="repopulate(this,'Phone')" onkeyup="formatPhoneNum(this,'-','no')">
        </div>
        <div id="joe_bare_form_row">
            <div id="joe_bare_form_select">
                <select name="program" id="program" class="jf_required">
                    <option value="">Area of Interest</option>
                        <?php
                            //print_r($programs);
                            foreach($programs AS $key=>$value){
                        ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php
                            } //end foreach program
                        ?>
                    </select>
            </div>
        </div>
        <div id="joe_bare_form_row">
            <input type="submit" name="submit" id="submit" value="Submit Form" class="submit_button">
        </div>
    </div>
</div>