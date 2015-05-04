<?php
    require_once('../../../../wp-config.php');
    require_once('../../../../wp-content/plugins/jf_form/class/jf_form.php');
    $jf = new jf_form();
    $id = strip_tags($_POST['id']);
    $details = $jf->getLeadDetail($id);
    $avoid = array("action", "submit");
    $skip = "no";
?>
<p>Here are the fields and values from the lead submission:</p>
<div id="jf_record" style="width: 100px;"><b>Field</b></div><div id="jf_record" style="width: 200px;"><b>Submitted Value</b></div><div style="clear: both;">&nbsp;</div>
<?php
    foreach($details AS $d){
        foreach($avoid AS $a){
            if($a == $d->key_name){$skip = "yes";break;}else{$skip = "no";}
        }
        if($skip == 'yes'){continue;}
?>
        <div id="jf_record" style="width: 150px; text-decoration: none;"><?php echo strtoupper($d->key_name); ?></div><div id="jf_record" style="width: 200px; text-decoration: none;"><?php echo $d->submission_value; ?></div><div style="clear: both;">&nbsp;</div>
<?php
    }
?>