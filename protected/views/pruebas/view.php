<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	$model->IdPrueba,
);

$this->menu=array(
	array('label'=>'Listar Pruebas', 'url'=>array('index')),
	array('label'=>'Crear Pruebas', 'url'=>array('create')),
	array('label'=>'Actualizar Pruebas', 'url'=>array('update', 'id'=>$model->IdPrueba)),
	array('label'=>'Eliminar Pruebas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPrueba),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Pruebas', 'url'=>array('admin')),
);
?>

<h1>View Pruebas #<?php echo $model->IdPrueba; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdPrueba',
		'IdCita',
		'IdPaciente',
		'IdTipoDiagnostico',
		'Fecha_Hora',
		'Descripcion',
		'Tratamiento',
		'Notas',
	),
)); ?>
