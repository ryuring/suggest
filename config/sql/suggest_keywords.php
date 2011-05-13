<?php 
/* SVN FILE: $Id$ */
/* SuggestKeywords schema generated on: 2011-05-13 11:05:23 : 1305253103*/
class SuggestKeywordsSchema extends CakeSchema {
	var $name = 'SuggestKeywords';

	var $file = 'suggest_keywords.php';

	var $connection = 'plugin';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $suggest_keywords = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 8, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'views' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>