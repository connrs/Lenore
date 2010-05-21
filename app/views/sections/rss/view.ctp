<?php if(!empty($section['Article'])):?>
<?php foreach($section['Article'] as $article) {?>
	<item>
		<title><?php echo $article['title'] ?></title>
		<link><?php echo "http://{$_SERVER['HTTP_HOST']}".$html->url("/{$section['Section']['slug']}/{$article['slug']}")?></link>
		<guid isPermaLink="true"><?php echo "http://{$_SERVER['HTTP_HOST']}".$html->url("/{$section['Section']['slug']}/{$article['slug']}")?></guid>
		<description>
			<![CDATA[<?php echo $rss->relToAbs($textAssistant->htmlFormatted($article['description'],$article['Resource'],'Article',
				$mediaAssistant->generateMediaLinkAttributes($article['Resource'],array('style'=>'float:right;margin: 0 0 10px 10px'))))?>]]>
		</description>
		<author><?php echo MOONLIGHT_WEBMASTER_EMAIL.' ('.MOONLIGHT_WEBMASTER_NAME.')' ?></author>
		<pubDate><?php echo $time->toRSS($article['modified'])?> GMT</pubDate>
	</item>
<?php }?>
<?php endif;?>
