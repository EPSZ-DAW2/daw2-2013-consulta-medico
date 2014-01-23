<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	$model->IdPrueba=>array('view','id'=>$model->IdPrueba),
	'Actualizar Prueba',
);

$this->menu=array(
	array('label'=>'Listar Pruebas', 'url'=>array('index')),
	array('label'=>'Crear Pruebas', 'url'=>array('create')),
	array('label'=>'Ver Pruebas', 'url'=>array('view', 'id'=>$model->IdPrueba)),
	array('label'=>'Gestionar Pruebas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Pruebas <?php echo $model->IdPrueba; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>