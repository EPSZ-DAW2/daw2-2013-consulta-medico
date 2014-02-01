<?php
/* @var $this ImportarController */

$this->breadcrumbs=array(
	'Exportar',
);
?>
<div class="yiiForm">
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($exportar); ?>
	 
	<div class="simple">
	<?php echo CHtml::activeLabel($exportar,'username'); ?>
	<?php echo CHtml::activeTextField($exportar,'username'); ?>
	</div>
	 
	<div class="simple">
	<?php echo CHtml::activeLabel($exportar,'password'); ?>
	<?php echo CHtml::activePasswordField($exportar,'password');
	?>
	</div>
	 
	<div class="action">
	<?php echo CHtml::activeCheckBox($exportar,'rememberMe'); ?>
	Remember me next time<br/>
	<?php echo CHtml::submitButton('Login'); ?>
	</div>
	 
	<?php echo CHtml::endForm(); ?>
</div><!-- yiiForm -->


<?	
	//DLDatabaseHelper::export(); 	
?>