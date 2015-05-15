<div id="joe_bare_form_contain" style="overflow: auto;">
    <div id="joe_bare_form_mobile" style="overflow: auto;">
        <h1 style="text-align: left;">Contact Us</h1>
        <p><b>Dedicated to Professionally Training & Educating Our Students</b><br><br>
            For information about HealthStaff's programs, courses schedule or for general inquiries, please complete the form below and a HealthStaff representative will contact you.<br><br>
        <b>Tell Us About Yourself & Your Training Goals</b></p>
        <div id="joe_form_err"></div>
        <div id="joe_form_half">
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
                        <option value="">Program of Interest</option>
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
        </div>
        <div id="joe_form_half">
            <div id="joe_bare_form_row">
                <div id="joe_bare_form_select">
                    <select name="start_date" id="start_date">
                        <option value="">Prospective Start Date</option>
                        <?php
                        // Set timezone
                        date_default_timezone_set('UTC');
                        // Start date
                        $date = DATE('M d, Y');
                        // End date
                        $end_date = date ("M d, Y", strtotime("+1 year", strtotime($date)));
                        $x = 0;
                        while (strtotime($date) <= strtotime($end_date)) {
                            $date = date ("M d, Y", strtotime("+1 month", strtotime($date)));
                            $display_date = date('M, Y', strtotime($date));
                            ?>
                            <option value="<?php echo $display_date;?>"><?php echo $display_date;?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div id="joe_bare_form_row">
                <div id="joe_bare_form_select">
                    <select name="best_contact_time" id="best_contact_time">
                        <option value="">Best time to reach you</option>
                        <option value="Morning">Morning</option>
                        <option value="Noon">Noon</option>
                        <option value="Afternoon">Afternoon</option>
                        <option value="Evening">Evening</option>
                    </select>
                </div>
            </div>
            <div id="joe_bare_form_row">
                <textarea class="joe_form_textarea" onkeyup="textArea(this)">Comments</textarea>
            </div>
            <div id="joe_bare_form_row">
                <input type="submit" name="submit" id="submit" value="Submit Form" class="submit_button">
            </div>
        </div>
    </div>
</div>