<?php echo $html->link(sprintf("Edit %s",!empty($l_title)?$l_title:Configure::read("$model.alias")),array('admin'=>true,'controller'=>$controller,'action'=>'edit',$id),array('class'=>'edit button'));?>