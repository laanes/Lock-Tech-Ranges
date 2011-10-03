<?php
// /*

// +--------------------------------------------------------------------------

// |	Lock-Tech_Ranges.inc.php

// |   ========================================

// |	Lock-Tech_Ranges module for navigating the shop by range.

// +--------------------------------------------------------------------------

// */

/* Import classes */
require_once('modules'.CC_DS.'3rdparty'.CC_DS.'Lock-Tech_Ranges'.CC_DS.'Lock-Tech_Ranges.class.php');

$box_content->parse('Lock-Tech_Ranges');

$box_content = $box_content->text('Lock-Tech_Ranges');

?>