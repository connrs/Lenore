<div class="item">
<h3>Media</h3>
<h4>Image</h4>
<?php
if(!empty($category['Decorative'])) echo $this->element('admin/deco_image',array(
		'deco_id'=>$category['Decorative'][0]['id'],'deco_title'=>$category['Decorative'][0]['title'],'parent'=>$category));
else echo $this->element('admin/deco_image_empty',array('parent'=>$category));
?> 
<h4>Inline Media</h4>
<p><?php echo $html->link('Manage inline media','manageinline/'.$category['Category']['id']) ?> (<?php
$inline_media_offset = count($category['Resource']) - ((int) $category['Category']['inline_count']);
if($inline_media_offset == 0)
	echo "You have uploaded the required amount of inline media for this item.";
elseif($inline_media_offset > 0)
	echo "You have too many media files for this item. You need to select $inline_media_offset for deletion.";
else
	echo "You have too few media files for this item. You need to upload ".($inline_media_offset * -1)." more.";
?>)</p>
<h4>Downloads</h4>
<?php if(!empty($category['Downloadable'])):?>
<?php echo $this->element('admin/download_view',array('resources'=>$category['Downloadable']))?> 
<?php endif;?>
<?php echo $this->element('admin/download_form',array('parent'=>$category))?> 
</div>