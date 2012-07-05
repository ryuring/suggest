<?php
/* SVN FILE: $Id$ */
/**
 * [Suggest] 設定モデル
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			suggest.models
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
 * サジェスト設定モデル
 *
 * @package			baser.plugins.uploader.models
 */
class SuggestConfig extends AppModel {
/**
 * モデル名
 * @var     string
 * @access  public
 */
	var $name = 'SuggestConfig';
/**
 * データソース
 *
 * @var		string
 * @access 	public
 */
	var $useDbConfig = 'plugin';
/**
 * プラグイン名
 *
 * @var		string
 * @access 	public
 */
	var $plugin = 'Suggest';

}