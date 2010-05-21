<?php if(!empty($articles)):?>
<?php foreach($articles as $article) {?>
	<item>
		<title><?php echo $article['Article']['title'] ?></title>
		<category><?php echo htmlentities($article['Section']['title']) ?></category>
		<link><?php echo "http://{$_SERVER['HTTP_HOST']}".$html->url("/{$article['Section']['slug']}/{$article['Article']['slug']}")?></link>
		<guid isPermaLink="true"><?php echo "http://{$_SERVER['HTTP_HOST']}".$html->url("/{$article['Section']['slug']}/{$article['Article']['slug']}")?></guid>
		<description>
			<![CDATA[<?php echo $rss->relToAbs($textAssistant->htmlFormatted($article['Article']['description'],$article['Resource'],'Article',
			$mediaAssistant->generateMediaLinkAttributes($article['Resource'],array('style'=>'float:right;margin: 0 0 10px 10px'))))?>]]>
		</description>
		<author><?php echo MOONLIGHT_WEBMASTER_EMAIL.' ('.MOONLIGHT_WEBMASTER_NAME.')' ?></author>
		<pubDate><?php echo $time->toRSS($article['Article']['modified'])?> GMT</pubDate>
	</item>
<?php }?>
<?php endif;?>
