<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Crear Pacientes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pacientes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Pacientes</h1>


<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pacientes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile' => false,
	'pager' => array (
		'cssFile'=> false
	),
	'columns'=>array(
		/*'IdPaciente',*/
		'Apellidos',
		'Nombre',
		'DNI_NIF',
		'Fecha_nacimiento',
		'Direccion',
		/*
		'CodPostal',
		'Localidad',
		'Provincia',
		'TelFijo',
		'TelMovil',
		'Email',*/
		'aseguradoras.Nombre',
		//'Notas',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
