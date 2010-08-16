<?php
setlocale(LC_MONETARY, 'en_GB.UTF8');
$config = array(
	'Category' => array(
		'alias' => 'Product',
		'use_subcategories' => true
	),
	'Product' => array(
		'alias' => 'Product',
		'sales_options'=>true
	),
	'Section' => array(
		'alias' => 'Page'
	),
	'Article' => array(
		'alias' => 'Article'
	),
	'ProtectedSection' => array(
		'alias' => 'Protected Area'
	),
	'ProtectedItem' => array(
		'alias' => 'Protected Item'
	),
	'Resource' => array(
		'media_path' => ROOT.DS.APP_DIR.DS.'webroot'.DS.'media',
		'web_root' => '/media',
		'accept_types' => array('image/jpeg','image/gif','image/png')
	),
	'Rss' => array(
		'cache_path' => ROOT.DS.APP_DIR.DS.'tmp'.DS.'cache'.DS.'rss'
	),
	'Thumb' => array(
		'cache_path' => ROOT.DS.APP_DIR.DS."tmp".DS.'cache'.DS.'thumbnails',
		'imagemagick_path' => '/usr/bin/convert',
		'media_parameters' => array(
			'crop'=>array('w'=>75,'h'=>75),
			'banner'=>array('h'=>150,'aoe'=>1,'far'=>'C'),
			'figure'=>array('w'=>435,'aoe'=>1,'far'=>'C'),
			'fadedbanner'=>array('w'=>550,'h'=>160,'fltr'=>'clr|50|FFFFFF'),
			'sidebar'=>array('w'=>150,'h'=>150)
		)
	),
	'TextAssistant' => array(
		'allow_html_in_descriptions' => false,
		'permitted_html_elements' => '' //'<p><div><span><blockquote><dd><dl><dt><ul><li><ol><h4><h3><h2><pre><code><kbd><tt><q><cite>'
	),
	'Moonlight' => array(
		'webmaster_email' => '',
		'webmaster_name' => '',
		'website_name' => '',
		'website_description' => '',
		'template_theme' => '',
		'use_html' => true
	),
	'Menu' => array(
		'prefix' => array(''=>'Home'),
		'suffix' => array('contact'=>'Contact Us'),
		'omissions' => array('home','contact')
	),
	'Admin' => array(
		'active_modules' => array(
			'Category'=>array('dashboard_icon'=>'/img/admin/category_module.png','alias'=>'Product'),
			'Section'=>array('dashboard_icon'=>'/img/admin/section_module.png','alias'=>'Page')
		)
	)
);
?>