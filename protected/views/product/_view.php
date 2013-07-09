<?php
/* @var $this ProductController */
/* @var $data Product */
?>
<!--
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->pic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />
</div>
-->

<div class="view">

<table widht="100%">
	<tr>
		<td width="50%">
			<img src="<?php echo CHtml::encode($data->pic); ?>"/>
		</td>
		<td width="50%">
			<table widht="100%">
				<tr>
					<td><?php echo CHtml::encode($data->name); ?></td>
				</tr>
				<tr>
					<td><?php echo CHtml::encode($data->price); ?></td>
				</tr>
			</table>
		</td>
	</tr>
<table>
</div>