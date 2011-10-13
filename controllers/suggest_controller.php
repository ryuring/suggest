<?php
/* SVN FILE: $Id$ */
/**
 * サジェストコントローラー
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2011 - 2011, Catchup, Inc.
 *								1-19-4 ikinomatsubara, fukuoka-shi
 *								fukuoka, Japan 819-0055
 *
 * @copyright		Copyright 2011 - 2011, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			suggest.controllers
 * @since			Baser v 1.6.11
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
/**
 * Include files
 */
App::import('Controller', 'Plugins');
/**
 * サジェストコントローラー
 *
 * @package	suggest.controllers
 */
class SuggestController extends PluginsController {
/**
 * クラス名
 * 
 * @var string
 * @access public
 */
	var $name = 'SuggestController';
/**
 * クラス名
 * 
 * @var array
 * @access public
 */
	var $uses = array('Plugin', 'Suggest.SuggestKeyword');
/**
 * クラス名
 * 
 * @var array
 * @access public
 */
	var $components = array('RequestHandler');
/**
 * [AJAX] サジェストキーワードを取得
 * 
 * @return $suggestKeywords （echo で出力）
 * @access public
 */
	function ajax_keyword() {
		
		if(isset($this->params['url']['q'])) {
			
			$default = array('named' => array('num' => 10));
			$this->setViewConditions('SuggestKeyword', array('default' => $default, 'type' => 'get'));
			$suggestKeywords = $this->SuggestKeyword->find('all', array(
				'conditions'=> $this->_createSuggestConditions($this->data),
				'fields'	=> array('SuggestKeyword.name'),
				'order'		=> 'SuggestKeyword.views DESC',
				'limit'		=> $this->passedArgs['num']
			));
			if($suggestKeywords) {
				$suggestKeywords = Set::extract('/SuggestKeyword/name', $suggestKeywords);
				echo implode(" \n", $suggestKeywords);
			}

		}
		exit();
		
	}
/**
 * 検索条件を生成する
 *
 * @param	array	$data
 * @return	array	$conditions
 * @access	protected
 */
	function _createSuggestConditions($data) {
		
		$query = '';
		if(isset($data['SuggestKeyword']['q'])) {
			$query = mb_convert_kana(strtolower($data['SuggestKeyword']['q']), 'a', Configure::read('App.encoding'));
			unset($data['SuggestKeyword']['q']);
		}

		if($query) {
			$query = $this->_parseQuery($query);
			foreach($query as $key => $value) {
				$conditions['and'][$key] = array('SuggestKeyword.name LIKE' => "%{$value}%");
			}
		}

		return $conditions;
		
	}
/**
 * キーワードを分解し配列に変換する
 *
 * @param string $query
 * @return array
 * @access protected
 */
	function _parseQuery($query) {
		
		$query = str_replace('　', ' ', $query);
		if(strpos($query, ' ') !== false) {
			$query = explode(' ', $query);
		} else {
			$query = array($query);
		}
		return $query;
		
	}
	
}