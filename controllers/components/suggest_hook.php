<?php
/* SVN FILE: $Id$ */
/**
 * サジェストフックコンポーネント
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
 * @package			suggest.controllers.components
 * @since			Baser v 1.6.11
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
/**
 * Include files
 */
/**
 * サジェストフックコンポーネント
 *
 * @package	suggest.controllers.components
 */
class SuggestHookComponent extends Object {
/**
 * 登録フック
 *
 * @var array
 * @access public
 */
	var $registerHooks = array('startup');
/**
 * startup
 *
 * @param Controller $controller
 * @return void
 * @access public
 */
	function startup(&$controller) {

		if ($controller->name == 'Contents' && $controller->action == 'search') {
			
			$SuggestConfig = ClassRegistry::init('Suggest.SuggestConfig');
			$suggestConfigs = $SuggestConfig->findExpanded();
			$excludeKeywords = array();
			if($suggestConfigs['exclude_keywords']) {
				$excludeKeywords = explode(',',$suggestConfigs['exclude_keywords']);
			}
			// 検索キーワードを複合キーワードとして３つまで保存する
			$query = mb_convert_kana(strtolower($controller->params['url']['q']), 'a', Configure::read('App.encoding'));
			$keyword = str_replace('　', ' ', $query);
			$keyword = explode(' ', $keyword);
			$save = true;
			$_keyword = array();
			foreach($keyword as $key => $value) {
				if(in_array($value, $excludeKeywords)) {
					$save = false;
					break;
				} elseif($key < 3) {
					$_keyword[$key] = $keyword[$key];
				} else {
					break;
				}
			}
			
			if($save) {
				$keyword = implode(' ', $_keyword);
				$conditions = array('SuggestKeyword.name' => $keyword);
				$SuggestKeyword = ClassRegistry::init('Suggest.SuggestKeyword');
				$data = $SuggestKeyword->find('first', array(
					'fields'		=> array('SuggestKeyword.id', 'SuggestKeyword.views'),
					'conditions'	=> $conditions));
				if(!$data) {
					$data['SuggestKeyword']['name'] = $keyword;
					$data['SuggestKeyword']['views'] = 1;
					$SuggestKeyword->create($data);
				} else {
					$data['SuggestKeyword']['views']++;
					$SuggestKeyword->set($data);	
				}

				$SuggestKeyword->save();
			}
			
		}

	}
	
}
?>