<?php
/*
=====================================================
 MWS Custom Attachments v1.2 - by MaRZoCHi
-----------------------------------------------------
 Site: http://dle.net.tr/
-----------------------------------------------------
 Copyright (c) 2014
-----------------------------------------------------
 Lisans: GPL License
=====================================================
*/

if( ! defined( 'E_DEPRECATED' ) ) {
	@error_reporting ( E_ALL ^ E_NOTICE );
	@ini_set ( 'error_reporting', E_ALL ^ E_NOTICE );
} else {
	@error_reporting ( E_ALL ^ E_DEPRECATED ^ E_NOTICE );
	@ini_set ( 'error_reporting', E_ALL ^ E_DEPRECATED ^ E_NOTICE );
}

define ( 'DATALIFEENGINE', true );
define ( 'ROOT_DIR', dirname ( __FILE__ ) );
define ( 'ENGINE_DIR', ROOT_DIR . '/engine' );
define ( 'LANG_DIR', ROOT_DIR . '/language/' );

require_once(ENGINE_DIR."/inc/include/functions.inc.php");
require_once(ENGINE_DIR."/data/config.php");
require_once(ROOT_DIR."/language/".$config['langs']."/adminpanel.lng");
require_once(ENGINE_DIR."/classes/mysql.php");
require_once(ENGINE_DIR."/data/dbconfig.php");
require_once(ENGINE_DIR."/modules/sitelogin.php");
require_once ENGINE_DIR . "/classes/install.class.php";
require_once ENGINE_DIR . "/api/api.class.php";
	
@header( "Content-type: text/html; charset=" . $config['charset'] );
require_once(ROOT_DIR."/language/".$config['langs']."/adminpanel.lng");

$Turkish = array ( 'm01' => "Kuruluma Başla", 'm02' => "Yükle", 'm03' => "Kaldır", 'm04' => "Yapımcı", 'm05' => "Çıkış Tarihi", 'm08' => "Kurulum Tamamlandı", 'm10' => "dosyasını silerek kurulumu bitirebilirsiniz", 'm11' => "Modül Kaldırıldı", 'm21' => "Kuruluma başlamadan önce olası hatalara karşı veritabanınızı yedekleyin", 'm22' => "Eğer herşeyin tamam olduğuna eminseniz", 'm23' => "butonuna basabilirsiniz.", 'm24' => "Güncelle", 'm25' => "Site", 'm26' => "Çeviri" );
$English = array ( 'm01' => "Start Installation", 'm02' => "Install", 'm03' => "Uninstall", 'm04' => "Author", 'm05' => "Release Date", 'm06' => "Module Page", 'm07' => "Support Forum", 'm08' => "Installation Finished", 'm10' => "delete this file to finish installation", 'm11' => "Module Uninstalled", 'm21' => "Back up your database before starting the installation for possible errors", 'm22' => "If you are sure that everything is okay, ", 'm23' => "click button.", 'm24' => "Upgrade", 'm25' => "Site", 'm26' => "Translation" );
$Russian = array ( 'm01' => "Начало установки", 'm02' => "Установить", 'm03' => "Удалить", 'm04' => "Автор", 'm05' => "Дата выпуска", 'm06' => "Страница модуля", 'm07' => "Форум поддержки", 'm08' => "Установка завершена", 'm10' => "удалите этот фаля для окончания установки", 'm11' => "Модуль удален", 'm21' => "Сделайте резервное копирование базы данных для избежания возможных ошибок", 'm22' => "Если вы уверены что всё впорядке, ", 'm23' => "нажмите кнопку.", 'm24' => "обновлять", 'm25' => "сайт", 'm26' => "перевод" );
$lang = array_merge( $lang, $$config['langs'] );

function mainTable_head( $title ) {
	echo <<< HTML
	<div class="box">
		<div class="box-header">
			<div class="title"><div class="box-nav"><font size="2">{$title}</font></div></div>
		</div>
		<div class="box-content">
			<table class="table table-normal">
HTML;
}

function mainTable_foot() {
	echo <<< HTML
			</table>
		</div>
	</div>
HTML;
}

$module = array(
	'name'	=> "MWS Custom Attachments v1.2",
	'desc'	=> "",
	'id'	=> "",
	'icon'	=> "",
	'date'	=> "15.07.2014",
	'ifile'	=> "install_module.php",
	'link'	=> "http://dle.net.tr",
	'image'	=> "http://img.dle.net.tr/mws/custom_attachments.png",
	'author_n'	=> "Mehmet Hanoğlu (MaRZoCHi)",
	'author_s'	=> "http://dle.net.tr",
	'tran_n'	=> "",
	'tran_s'	=> "",
);

echoheader("<i class=\"icon-folder-open\"></i>" . $module['name'], $lang['m01'] );

if ( $_REQUEST['action'] == "install" ) {

	$mod = new VQEdit();
	$mod->backup = True;
	$mod->bootup( $path = ROOT_DIR, $logging = True );
	$mod->file( ROOT_DIR. "/install/xml/custom_attachments_12.xml" );
	$mod->close();

	mainTable_head( $lang['m08'] );
	echo <<< HTML
	<table width="100%">
		<tr>
			<td width="210" align="center" valign="middle" style="padding:4px;">
				<img src="{$module['image']}" alt="" />
			</td>
			<td style="padding-left:20px;padding-top: 4px;" valign="top">
				<b><a href="{$module['link']}">{$module['name']}</a></b><br /><br />
				<b>{$lang['m04']}</b> : <a href="{$module['author_s']}">{$module['author_n']}</a><br />{$translation}
				<b>{$lang['m05']}</b> : <font color="#555555">{$module['date']}</font><br />
				<b>{$lang['m25']}</b> : <a href="{$module['link']}">{$module['link']}</a><br />
				<br /><br />
				<b><font color="#BF0000">{$module['ifile']}</font> {$lang['m10']}</b><br />
			</td>
		</tr>
	</table>
HTML;
	mainTable_foot();

} else {

	mainTable_head( $lang['m01'] );

	$translation = ( ! empty( $module['tran_n'] ) ) ? "<b>{$lang['m26']}</b> : <a href=\"{$module['tran_s']}\">{$module['tran_n']}</a><br />" : "";
	echo <<< HTML
	<table width="100%">
		<tr>
			<td width="210" align="center" valign="middle" style="padding:4px;">
				<img src="{$module['image']}" alt="" /><br /><br />
			</td>
			<td style="padding-left:20px;padding-top: 4px;" valign="top">
				<b><a href="{$module['link']}">{$module['name']}</a></b><br /><br />
				<b>{$lang['m04']}</b> : <a href="{$module['author_s']}">{$module['author_n']}</a><br />{$translation}
				<b>{$lang['m05']}</b> : <font color="#555555">{$module['date']}</font><br />
				<b>{$lang['m25']}</b> : <a href="{$module['link']}">{$module['link']}</a><br />
				<br /><br />
				<b><font color="#BF0000">{$lang['m01']} ...</font></b><br /><br />
				<b>*</b> {$lang['m21']}<br />
				<b>*</b> {$lang['m22']} <font color="#51A351"><b>{$lang['m02']}</b></font> {$lang['m23']}<br />
			</td>
		</tr>
		<tr>
			<td width="150" align="left" style="padding:4px;"></td>
			<td colspan="2" style="padding:4px;" align="right">
HTML;
		echo "<input type=\"button\" value=\"{$lang['m02']}\" class=\"btn btn-green\" onclick=\"location.href='{$PHP_SELF}?action=install'\" />";
		echo <<< HTML
			</td>
		</tr>
	</table>
HTML;
	mainTable_foot();
	$db->free();
}

echofooter();
?>
