<?php
/* @var $this FacturasController */
/* @var $data Facturas */
?>

<div class="view">

	<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
    'collapsed'=>true,
    'legend'=> CHtml::encode($data->IdFactura).'-'.CHtml::encode($data->Serie).'-'.CHtml::encode($data->Numero).'---'.CHtml::encode($data->paciente->Nombre).' '.CHtml::encode($data->paciente->Apellidos) ,
    'legendHtmlOptions'=>array('title'=>'¡Haz click con el ratón para expandir!')
	));?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFactura')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdFactura).'-'.CHtml::encode($data->Serie).'-'.CHtml::encode($data->Numero), array('view', 'id'=>$data->IdFactura)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPaciente')); ?>:</b>
	<?php echo CHtml::encode($data->paciente->DNI_NIF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Concepto')); ?>:</b>
	<?php echo CHtml::encode($data->Concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Importe')); ?>:</b>
	<?php echo CHtml::encode($data->Importe).' €'; ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCobro')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Notas')); ?>:</b>
	<?php echo CHtml::encode($data->Notas); ?>
	<br />
	
	<?php $this->endWidget('ext.coolfieldset.JCollapsibleFieldset'); ?>
	
</div>