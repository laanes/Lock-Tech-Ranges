<?php  
require_once(dirname(__FILE__) . '/simpletest/autorun.php');  
require_once('../classes/Lock-Tech_Ranges.class.php');  

    class TestRanges extends UnitTestCase {  

    	function testTrue() {
    			
    	$ranges = new Lock_Tech_Ranges();

    	$this->assertTrue($ranges->returnTrue());

    	}

    }  