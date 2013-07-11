<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

<table class="view">
	<tr>
		<td class="view"><?php echo CHtml::encode($data->seq); ?></td>
		<td><?php echo date("H:i",$data->id); ?></td>

	</tr>
</table>

</table>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seq')); ?>:</b>
	<?php echo CHtml::encode($data->seq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish_time')); ?>:</b>
	<?php echo CHtml::encode($data->finish_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />


</div>