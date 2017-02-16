<?php
class SuggestViewEventListener extends BcViewEventListener {
	
/**
 * イベント
 *
 * @var array
 * @access public
 */
	public $events  = array('beforeRender');
	
/**
 * 
 */
	public function beforeRender(CakeEvent $event) {
		
		if(BcUtil::isAdminSystem()) {
			return;
		}
		
		$View = $event->subject();
		if(!empty($View->BcBaser)) {
			$View->BcBaser->js('Suggest.jquery.autocomplete', false);
			$View->BcBaser->css('Suggest.jquery.autocomplete', array('inline' => false));
			$url = $View->BcBaser->getUrl('/suggest/suggest/ajax_keyword');
			$script = <<< DOC_END
$(document).ready(function(){
    $('#SearchIndexQ').autocomplete('{$url}',{
		scroll:false,
		noRecord:'',
		onItemSelect:function(){
			$("#SearchIndexSearchForm").submit();
		}
	});
});
DOC_END;
			$View->BcHtml->scriptBlock($script, array('inline' => false));
		}

	}
	
}