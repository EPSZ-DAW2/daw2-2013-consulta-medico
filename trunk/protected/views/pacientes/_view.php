<?php
/* @var $this PacientesController */
/* @var $data Pacientes */
?>

<div class="view">
		<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'collapsed'=>true,
        'legend'=> CHtml::encode($data->Apellidos) ,
        'legendHtmlOptions'=>array('title'=>'Click me with the mouse!')
		)); ?>
				
				<b><?php echo CHtml::encode($data->getAttributeLabel('IdPaciente')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->IdPaciente), array('view', 'id'=>$data->IdPaciente)); ?>
				<br />
				<b><?php echo CHtml::encode($data->getAttributeLabel('Apellidos')); ?>:</b>
				<?php echo CHtml::encode($data->Apellidos); ?>
				<br />
				<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
				<?php echo CHtml::encode($data->Nombre); ?>
				<br />
				<b><?php echo CHtml::encode($data->getAttributeLabel('DNI_NIF')); ?>:</b>
				<?php echo CHtml::encode($data->DNI_NIF); ?>
				<br />
				<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_nacimiento')); ?>:</b>
				<?php echo CHtml::encode($data->Fecha_nacimiento); ?>
				<br />
				<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
				<?php echo CHtml::encode($data->Direccion); ?>
				<br />
				<b><?php echo CHtml::encode($data->getAttributeLabel('CodPostal')); ?>:</b>
				<?php echo CHtml::encode($data->CodPostal); ?>
				<br />
		<?php $this->endWidget('ext.coolfieldset.JCollapsibleFieldset'); ?>

</div>
