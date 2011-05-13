<?php
/* SVN FILE: $Id$ */
/**
 * サジェストキーワードモデル
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
 * @package			suggest.models
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