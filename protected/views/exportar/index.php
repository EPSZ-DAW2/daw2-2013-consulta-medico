<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">
        <h4><?php echo Yii::app()->user->getFlash('error'); ?></h4>
    </div>
<?php endif; ?>

<div class="yiiForm">
	<?php echo CHtml::beginForm(); ?>
	
	<h5>Elija las tablas que desea exportar:</h5>
	
	<!--Botones de check de las tablas-->
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
	
	</br><h5>Elija el formato en el que desea exportar:</h5>
	
	<!--Botones de radio para el tipo de archivo-->
	<div class="simple">
			<?php echo  CHtml::activeRadioButton($exportar,'opcion',array('value'=>0)) . 'XML';
				  echo  CHtml::activeRadioButton($exportar,'opcion',array('value'=>1)) . 'SQL'; ?>
	</div></br>
	
	<div class="action">
	<?php echo CHtml::submitButton('Exportar'); ?>
	</div>
	 
	<?php echo CHtml::endForm(); ?>
</div>

<?php if(Yii::app()->user->hasFlash('informacion')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('informacion'); ?>
    </div></br>
<?php endif; ?>