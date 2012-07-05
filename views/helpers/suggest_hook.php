<?php
/* SVN FILE: $Id$ */
/**
 * [Suggest] フックヘルパー
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			suggest.views.helpers
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
/**
 * Include files
 */
/**
 * サジェストフックヘルパー
 *
 * @package	suggest.views.helpers
 */
class SuggestHookHelper extends AppHelper {
/**
 * 登録フック
 *
 * @var array
 * @access public
 */
	var $registerHooks  = array('beforeRender');
	function beforeRender() {
		parent::beforeRender();
		$view =& ClassRegistry::getObject('view');
		$baser = $view->loaded['bcBaser'];
		if(empty($view->params['admin']) && $baser) {
			$baser->js('/suggest/js/jquery.autocomplete', false);
			$baser->css('/suggest/css/jquery.autocomplete', null, null, false);
			$url = $this->url('/suggest/ajax_keyword');
			$script = <<< DOC_END
$(document).ready(function(){
    $('#ContentQ').autocomplete('{$url}',{
		scroll:false,
		onItemSelect:function(){
			$("#ContentSearchForm").submit();
		}
	});
});
DOC_END;
			$javascript = $view->loaded['javascript'];
			$javascript->codeBlock($script, array('inline' => false));
		}

	}
	
}
?>