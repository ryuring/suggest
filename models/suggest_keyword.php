<?php
/* SVN FILE: $Id$ */
/**
 * [Suggest] サジェストキーワードモデル
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
 * サジェストキーワードモデル
 *
 * @package	suggest.models
 */
class SuggestKeyword extends Model {
/**
 * クラス名
 *
 * @var		string
 * @access	public
 */
	var $name = 'SuggestKeyword';
/**
 * DB接続設定
 *
 * @var		string
 * @access	public
 */
	var $useDbConfig = 'plugin';
/**
 * プラグイン名
 *
 * @var		string
 * @access	public
 */
	var $plugin = 'Suggest';
}