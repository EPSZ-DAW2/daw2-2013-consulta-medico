<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradoras'=>array('index'),
	$model->idAseguradora,
);

$this->menu=array(
	array('label'=>'Lista de Aseguradoras', 'url'=>array('index')),
	array('label'=>'Crear Aseguradoras', 'url'=>array('create')),
	array('label'=>'Actualizar Aseguradoras', 'url'=>array('update', 'id'=>$model->idAseguradora)),
	array('label'=>'Eliminar Aseguradoras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAseguradora),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Ver Aseguradoras #<?php echo $model->idAseguradora; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => false,
	'pager' => array (
		'cssFile'=> false
	),
	'attributes'=>array(
		'idAseguradora',
		'Nombre',
		'Notas',
	),
)); ?>
