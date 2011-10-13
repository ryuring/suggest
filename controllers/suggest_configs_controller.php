<?php
/* SVN FILE: $Id$ */
/**
 * サジェスト設定コントローラー
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
 * コンポーネント
 *
 * @var array
 * @access public
 */
	var $components = array('AuthEx','Cookie','AuthConfigure');
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