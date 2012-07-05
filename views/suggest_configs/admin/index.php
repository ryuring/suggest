<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] サジェスト設定 フォーム
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
 * @package			suggest.views
 * @since			Baser v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>


<!-- form -->
<?php echo $bcForm->create('SuggestConfig', array('action' => 'index')) ?>

<table cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th class="col-head"><?php echo $bcForm->label('SuggestConfig.exclude_keywords', '除外キーワード') ?></th>
		<td class="col-input">
			<small>サジェストより除外するキーワードをカンマ区切りで入力します。</small><br />
			<?php echo $bcForm->input('SuggestConfig.exclude_keywords', array('type' => 'input', 'cols' => 70,'rows' => 5)) ?>&nbsp;
			<?php echo $bcForm->error('SuggestConfig.exclude_keywords') ?>
		</td>
	</tr>
</table>

<!-- button -->
<div class="submit">
	<?php echo $bcForm->submit('更　新', array('div' => false, 'class' => 'btn-orange button', 'id' => 'btnSubmit')) ?>
</div>

<?php echo $bcForm->end() ?>