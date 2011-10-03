<?php
// /*

// +--------------------------------------------------------------------------

// |	Lock-Tech_Ranges.inc.php

// |   ========================================

// |	Lock-Tech_Ranges module for navigating the shop by range.

// +--------------------------------------------------------------------------

// */

/* Import classes */
require_once('modules'.CC_DS.'3rdparty'.CC_DS.'lock_tech_ranges'.CC_DS.'lock_tech_ranges_box.class.php');

if(!empty($ranges->range_id)) {

$box_content = new XTemplate ('boxes'.CC_DS.'lock_tech_ranges_box.tpl');
	
for($i=0; $i<=$ranges->range_count-1; $i++) {

$box_content->assign('RANGE_ID',   $ranges->range_id[$i]);
$box_content->assign('RANGE_NAME', $ranges->range_name[$i]);

}

}

$box_content->parse('Lock-Tech_Ranges');

$box_content = $box_content->text('Lock-Tech_Ranges');

?>