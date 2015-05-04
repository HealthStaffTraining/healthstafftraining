<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="jf_admin_wrap">
    <h2><span class="dashicons dashicons-groups"></span> JF Form Entries</h2>
    <h3><span class="dashicons dashicons-groups"></span> Date Collected</h3>
    <div id="jf_record" style="width: 100px;"><b>Record ID</b></div><div id="jf_record" style="width: 200px;"><b>Creation Date</b></div><div id="jf_record" style="width: 200px;"><b>Lead Name</b></div><div style="clear: both;">&nbsp;</div>
    <?php
    foreach($entries AS $e){
        $leadName = $jf_form->getLeadDetailName($e->id);
        $timestamp = strtotime($e->create_time);
    ?>
        <div id="jf_record" onclick="getRecordDetail(<?php echo $e->id; ?>)" style="width: 100px;"><?php echo $e->id; ?></div><div id="jf_record" onclick="getRecordDetail(<?php echo $e->id; ?>)" style="width: 200px;"><?php echo DATE('M d, Y',$timestamp); ?></div><div id="jf_record" onclick="getRecordDetail(<?php echo $e->id; ?>)" style="width: 200px;"><?php echo $leadName; ?></div><div style="clear: both;">&nbsp;</div>
    <?php
    }
    ?>
    <div id="jf_form_detail_contain">
        <div id="jf_close_detail" onclick="closeDetail()">[X]</div>
        <h1>Lead Detail</h1>
        <div id="jf_form_detail_content"></div>
    </div>
</div>

