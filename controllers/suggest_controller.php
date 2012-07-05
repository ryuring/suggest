<?php
/* SVN FILE: $Id$ */
/**
 * [Suggest] サジェスト処理
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			suggest.controllers
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
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
 * コンポーネント
 * 
 * @var array
 * @access public
 */
	var $components = array('RequestHandler', 'BcAuth', 'Cookie', 'BcAuthConfigure');
/**
 * beforeFilter
 */
	function beforeFilter() {

		parent::beforeFilter();
		// 認証設定
		$this->BcAuth->allow('ajax_keyword');

	}
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
/**
 * [ADMIN] 検索履歴を削除する
 *
 * @return void
 * @access public
 */
	function admin_delete() {

		if($this->SuggestKeyword->deleteAll('1 = 1')) {
			$this->Session->setFlash('検索履歴を削除しました。');
		} else {
			$this->Session->setFlash('検索履歴の削除処理に失敗しました。');
		}

		$this->redirect(array('controller' => 'suggest_configs', 'action' => 'index'));

	}

}