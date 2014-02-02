<?php
/* @var $this ImportarController */

$this->breadcrumbs=array(
	'Exportar',
);

if(Yii::app()->user->hasFlash('error')):?>
    <div class="error">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>
<div class="yiiForm">
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($exportar); ?>
	
	<h5>Elija las tablas que desea exportar:</h5>
	 
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'aseguradoras'); ?>
	Aseguradoras<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'facturas'); ?>
	Facturas<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'pacientes'); ?>
	Pacientes<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'perfiles'); ?>
	Perfiles<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'perfilesusuarios'); ?>
	Perfiles de Usuarios<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'pruebas'); ?>
	Pruebas<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'tiposdiagnosticos'); ?>
	Tipos de Diagnósticos<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'usuarios'); ?>
	Usuarios<br/>
	</div>
	
	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'visitas'); ?>
	Visitas<br/>
	</div>
	<div class="simple">
			<?php echo  CHtml::activeRadioButton($exportar,'opcion',array('value'=>0)) . 'XML';
				  echo  CHtml::activeRadioButton($exportar,'opcion',array('value'=>1)) . 'SQL'; ?>
	</div>
	<div class="action">
	<?php echo CHtml::submitButton('Exportar'); ?>
	</div>
	 
	<?php echo CHtml::endForm(); ?>
</div><!-- yiiForm -->


<?	
	//DLDatabaseHelper::export(); 	
?>