<?php
/* SVN FILE: $Id: suggest_config.php 70 2011-05-18 10:16:45Z ryuring $ */
/**
 * サジェスト設定モデル
 *
 * PHP versions 4 and 5
 *
 * Baser :  Basic Creating Support Project <http://basercms.net>
 * Copyright 2011 - 2011, Catchup, Inc.
 *								1-19-4 ikinomatsubara, fukuoka-shi
 *								fukuoka, Japan 819-0055
 *
 * @copyright		Copyright 2011 - 2011, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			suggest.models
 * @since			Baser v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
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