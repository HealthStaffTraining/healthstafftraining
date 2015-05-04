function checkForm(){
    jQuery(".submit_form").css("background-color","#FFE720");
    jQuery("#joe_form_err").hide();
    jQuery("input").css("border","0px");
    jQuery("#joe_form_select").css("border", "0px solid red");
    jQuery('input[type="submit"]').attr('disabled','disabled');

    var err = "pass";
    var required = false;
    var isSelect = false;
    var value = "";
    var tagName = "";
    var invalids = [
      "First Name","Last Name","Email","Phone"
    ];

    jQuery('#jf_form_form *').filter(':input').each(function(){
        //your code here
        required = jQuery(this).hasClass( "jf_required" );
        isSelect = jQuery(this).is("select");
        tagName = jQuery(this).attr('name');
        if(required){
            value = jQuery(this).val();
            if(isSelect && value.length < 1) {
                err = "fail";
                jQuery(this).parent().css("border", "2px solid red");
            }else if(isSelect && value.length > 0){
                jQuery(this).parent().css("border", "0px solid red");
            }else if(tagName == "email") {
                if (!checkemail(value)) {
                    err = "fail";
                    jQuery(this).css("border", "2px solid red");
                }
            }else if(tagName == "phone"){
                if(value.length < 10){
                    err = "fail";
                    jQuery(this).css("border", "2px solid red");
                }
            }else{
                for (i = 0; i < invalids.length; ++i) {
                    if(value.length < 0 || value == invalids[i]){
                        //document.write(invalids[i]+"<br>");
                        err = "fail";
                        jQuery(this).css("border", "2px solid red");
                    }
                }
            }
        }

    });

    //$( "#mydiv" ).hasClass( "foo" );

    if(err == "fail"){
        jQuery("#joe_form_err").show();
        jQuery("#joe_form_err").text("There is a problem with the following field(s)");
        jQuery('input[type="submit"]').removeAttr('disabled');
    }else{
        return true;
    }
    //jQuery(".submit_form").css("background-color","#92cd1a");
    return false;
    
}

function insertFormName(e){
    var value = jQuery(e).val();
    jQuery.post( "admin.php?page=jf_form_menu", { jf_action: "insertFormName", formName: value })
        .done(function( data ) {
            alert( "Data Loaded:". value );
        });
}

function insertRecipients(e){
    var value = jQuery(e).val();
    jQuery.post( "admin.php?page=jf_form_menu", { jf_action: "insertRecipients", recipients: value })
        .done(function( data ) {
            //alert( "Data Loaded: " + data );
        });
}

function closeDetail(){
    jQuery("#jf_form_detail_content").html("");
    jQuery("#jf_form_detail_contain").hide();
}

function getRecordDetail(id){
    jQuery("#jf_form_detail_contain").show();
    jQuery.post( "/wp-content/plugins/jf_form/pgs/jf_form_admin_detail.php", { id: id })
        .done(function( data ) {
            jQuery("#jf_form_detail_content").html(data);
        });
}

/*
<input type="text" name="cardName" id="cardName" size="10" value="First Name" maxlength="20" onclick="clearFields(this)" onblur="repopulate(this,'First Name')">
*/
function clearFields(obj){
    jQuery(obj).val("");
    //jQuery(obj).css("color","#eaeaea");
}

function fillFields(obj){
    //jQuery(obj).css("color","##999999");
}

function repopulate(obj,newval){
	var val = jQuery(obj).val();
        jQuery(obj).css("color","##999999");
	if(val == ""){
		jQuery(obj).val(newval);
	}
}

/* ---------------------------------------------------------------------------- */
function formatPhoneNum(obj,del,parens){
	/* This function formats a phone number as the user types
		This function takes three values
			obj = the identifier of the calling field
			* = the delimiter to be used
			yes/no = group area code in parenthesis or not
		EXAMPLE: onkeyup="formatPhone(this,'-','no')" */
	var phone = jQuery(obj).val();
	if(parens == 'yes'){
		phone = phone.substring(0,13);
	}else{
		phone = phone.substring(0,12);
	}
	var phoneLen = phone.length;
	var num = phoneLen - 1;
	var lastChar = phone.charAt(num);

	if(lastChar != del){
		if(!IsAllowed(lastChar)){
			phone = phone.replace(lastChar, "");
			jQuery(obj).val(phone);
		}
	}

	switch(phoneLen)
	{
		case 1:
			if(parens == 'yes'){
				var C = phone.charAt(num);
				if(C != "("){
					newSTRING = "(" + C;
					jQuery(obj).val(newSTRING);
				}
			}
		break;
		case 4:
			if(parens == 'no'){
				var C = phone.charAt(num);
				if(C != del){
					var newSTRING = phone.substring(0,num);
					newSTRING = newSTRING + del + C;
					jQuery(obj).val(newSTRING);
				}
			}
		break;
		case 5:
			if(parens == 'yes'){
				var C = phone.charAt(num);
				if(C != ")"){
					var newSTRING = phone.substring(0,num);
					newSTRING = newSTRING + ")" + C;
					jQuery(obj).val(newSTRING);
				}
			}
		break;
		case 8:
			if(parens == 'no'){
				var C = phone.charAt(num);
				if(C != del){
					var newSTRING = phone.substring(0,num);
					newSTRING = newSTRING + del + C;
					jQuery(obj).val(newSTRING);
				}
			}
		break;
		case 9:
			if(parens == 'yes'){
				var C = phone.charAt(num);
				if(C != del){
					var newSTRING = phone.substring(0,num);
					newSTRING = newSTRING + del + C;
					jQuery(obj).val(newSTRING);
				}
			}
		break;
		default:
			jQuery(obj).val(phone);
	}

}
/* ---------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------
	CHECKS IF A STRING CONTAINS AN ALLOWABLE CHARACTER
	EXAMPLE:
		if(!IsAllowed(value)){
			var youSuck = 'true';
		}
--------------------------------------------------------------------------------------- */
function IsAllowed(sText){
	// A LIST OF ALLOWABLE CHARACTERS
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) {
		Char = sText.charAt(i);
		if (ValidChars.indexOf(Char) == -1) {
			IsNumber = false;
		}
	}
	return IsNumber;
}
/* ---------------------------------------------------------------------------- */

/* ---------------------------------------------------------------------------- */
function IsNumeric(strString){ // checks for numeric strings
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
}



/* ---------------------------------------------------------------------------- */

/*------------------------------------------------------------------------------------------------
	CHECKS TO SEE IF A STRING IS FORMATTED AS A VALID EMAIL ADDRESS
-------------------------------------------------------------------------------------------------*/
function checkemail(str){
	var testresults = false;
	var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (filter.test(str)){
			testresults=true;
		}
	return (testresults);
}

/*-----------------------------------------------------------------------------*/
/* COOKIE SETTING FUNCTIONS */
/*-----------------------------------------------------------------------------*/
function setAcookie(c_name,value,exdays)
{
	eraseCookie(c_name);
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString())+"; path=/";
	document.cookie=c_name + "=" + c_value;
}
function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=0'
}
/*-----------------------------------------------------------------------------*/