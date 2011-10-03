<?php 

class Lock_Tech_Ranges {

	public $range_id 	= array();
	public $range_name 	= array();
	public $range_count;
	
	public function __construct() {

	$this->setProperties();
	$this->setRangeCount();
		
	}

	private function setProperties() {
		
	$query = "SELECT range_id, range_name FROM lock_tech_ranges";	

	$rangeIds = $this->select($query);
		
	foreach($rangeIds as $key => $value): 

	$ids[] 	 = $value['range_id'];
	$names[] = $value['range_name'];

	endforeach;

	$this->range_id   = $ids;
	$this->range_name =	$names;

	}

	public function setRangeCount() {
		
	$this->range_count = count($this->range_id);

	}

		private function exec($query) {

		$link = mysql_connect('localhost', 'root', '');

		mysql_select_db('swansea3_lock-tech-shop');

		return mysql_query($query, $link);

		}

		function select($query, $maxRows = 0, $pageNum = 0) {

		$result = $this->exec($query);

		$max = mysql_num_rows($result);

		if ($max > 0) {

		for ($n = 0; $n < $max; ++$n) {

		$row = mysql_fetch_assoc($result);

		$output[$n] = $row;

		}

		return $output;

		} else {

		return false;

		}
		}


}

$ranges = new Lock_Tech_Ranges();

var_dump($ranges);

?>