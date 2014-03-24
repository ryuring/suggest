<?php 
/* SVN FILE: $Id: suggest_configs.php 70 2011-05-18 10:16:45Z ryuring $ */
/* SuggestConfigs schema generated on: 2011-05-13 11:05:03 : 1305252243*/
class SuggestConfigsSchema extends CakeSchema {
	public $name = 'SuggestConfigs';

	public $file = 'suggest_configs.php';

	public $connection = 'plugin';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $suggest_configs = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 8, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>