<?php
/* SVN FILE: $Id: suggest_configs_controller.php 1376 2011-10-24 04:32:40Z arata $ */
/**
 * サジェストコントローラー
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2011 - 2011, Catchup, Inc.
 *								9-5 nagao 3-chome, fukuoka-shi
 *								fukuoka, Japan 814-0123
 *
 * @copyright		Copyright 2011 - 2011, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			suggest.controllers
 * @since			Baser v 1.6.11
 * @version			$Revision: 1376 $
 * @modifiedby		$LastChangedBy: arata $
 * @lastmodified	$Date: 2011-10-24 13:32:40 +0900 (月, 24 10 2011) $
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
class SuggestConfigsController extends PluginsController {
/**
 * クラス名
 * 
 * @var string
 * @access public
 */
	var $name = 'SuggestConfigs';
/**
 * モデル
 * 
 * @var array
 * @access public
 */
	var $uses = array('Plugin', 'Suggest.SuggestConfig', 'Suggest.SuggestKeyword');
/**
 * サブメニューエレメント
 *
 * @var array
 * @access public
 */
	var $subMenuElements = array('suggest');
/**
 * [ADMIN] サジェスト設定
 *
 * @return	void
 * @access	public
 */
	function admin_index() {
		
		$this->pageTitle = 'サジェスト設定';
		
		if(!$this->data) {
			
			$this->data['SuggestConfig'] = $this->SuggestConfig->findExpanded();
			
		} else {
			
			$this->data['SuggestConfig']['exclude_keywords'] = mb_convert_kana(strtolower($this->data['SuggestConfig']['exclude_keywords']), 'a', Configure::read('App.encoding'));
			$this->SuggestConfig->set($this->data);
			
			if($this->SuggestConfig->validates()) {
				
				$this->SuggestConfig->saveKeyValue($this->data);
				
				// 除外キーワードを削除
				if($this->data['SuggestConfig']['exclude_keywords']) {

					$excludeKeywords = array();
					$excludeKeywords = explode(',', $this->data['SuggestConfig']['exclude_keywords']);
					$conditions = array();

					foreach($excludeKeywords as $key => $value) {
						$conditions['or'][$key] = array('SuggestKeyword.name LIKE' => "%{$value}%");
					}

					$suggestKeywords = $this->SuggestKeyword->find('all', array(
						'fields' => array('SuggestKeyword.id'), 
						'conditions' => $conditions
					));

					foreach($suggestKeywords as $suggestKeyword) {
						$this->SuggestKeyword->del($suggestKeyword['SuggestKeyword']['id']);
					}

				}
				
				$this->Session->setFlash('サジェスト設定を保存しました。');
				$this->redirect('index');
				
			} else {
				
				$this->Session->setFlash('入力エラーです。内容を修正してください。');
				
			}
			
		}
		
	}
	
}