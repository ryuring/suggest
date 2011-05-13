<?php
/* SVN FILE: $Id$ */
/**
 * サジェストフックヘルパー
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
 * @package			suggest.views.helpers
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
		$baser = $view->loaded['baser'];
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