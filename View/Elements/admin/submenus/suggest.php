<?php
/* SVN FILE: $Id$ */
/**
 * [Suggest] サブメニュー
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			suggest.views
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
?>


<tr>
	<th>サジェストプラグインメニュー</th>
	<td>
		<ul class="cleafix">
			<li>
				<?php $this->BcBaser->link('検索履歴を削除する', array('plugin' => 'suggest', 'controller' => 'suggest', 'action' => 'delete'), array(), '本当に検索履歴を削除して良いですか？') ?>
			</li>
		</ul>
	</td>
</tr>