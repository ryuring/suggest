<?php
/* SVN FILE: $Id$ */
/**
 * [Suggest] 設定ページ
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


<!-- form -->
<?php echo $this->BcForm->create('SuggestConfig', array('action' => 'index')) ?>

<table cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th class="col-head"><?php echo $this->BcForm->label('SuggestConfig.exclude_keywords', '除外キーワード') ?></th>
		<td class="col-input">
			<small>サジェストより除外するキーワードをカンマ区切りで入力します。</small><br />
			<?php echo $this->BcForm->input('SuggestConfig.exclude_keywords', array('type' => 'input', 'cols' => 70,'rows' => 5)) ?>&nbsp;
			<?php echo $this->BcForm->error('SuggestConfig.exclude_keywords') ?>
		</td>
	</tr>
</table>

<!-- button -->
<div class="submit">
	<?php echo $this->BcForm->submit('更　新', array('div' => false, 'class' => 'btn-orange button', 'id' => 'btnSubmit')) ?>
</div>

<?php echo $this->BcForm->end() ?>