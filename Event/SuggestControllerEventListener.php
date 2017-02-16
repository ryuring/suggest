<?php
class SuggestControllerEventListener extends BcControllerEventListener {
/**
 * イベント
 */
	public $events = array('SearchIndices.startup');
/**
 * startup
 *
 * @param CakeEvent $event
 * @return void
 * @access public
 */
	public function searchIndicesStartup(CakeEvent $event) {

		$Controller = $event->subject();
		if ($Controller->request->action != 'search') {
			return;
		}
			
		$SuggestConfig = ClassRegistry::init('Suggest.SuggestConfig');
		$suggestConfigs = $SuggestConfig->findExpanded();
		$excludeKeywords = array();
		if(!empty($suggestConfigs['exclude_keywords'])) {
			$excludeKeywords = explode(',',$suggestConfigs['exclude_keywords']);
		}
		// 検索キーワードを複合キーワードとして３つまで保存する
		$query = mb_convert_kana(strtolower($Controller->params['url']['q']), 'a', Configure::read('App.encoding'));
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