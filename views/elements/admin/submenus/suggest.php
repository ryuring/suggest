<?php
/**
 * [ADMIN] サジェスト設定 メニュー
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2011, Catchup, Inc.
 *								9-5 nagao 3-chome, fukuoka-shi
 *								fukuoka, Japan 814-0123
 *
 * @copyright		Copyright 2008 - 2011, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			baser.views
 * @since			Baser v 0.1.0
 * @version			$Revision: 154 $
 * @modifiedby		$LastChangedBy: ryuring $
 * @lastmodified	$Date: 2011-09-21 12:17:13 +0900 (水, 21 9 2011) $
 * @license			http://basercms.net/license/index.html
 */
?>


<tr>
	<th>サジェストプラグインメニュー</th>
	<td>
		<ul class="cleafix">
			<li>
				<?php $bcBaser->link('検索履歴を削除する', array('plugin' => 'suggest', 'controller' => 'suggest', 'action' => 'delete'), array(), '本当に検索履歴を削除して良いですか？') ?>
			</li>
		</ul>
	</td>
</tr>