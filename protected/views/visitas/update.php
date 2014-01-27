<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->IdCita=>array('view','id'=>$model->IdCita),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Ver Visitas', 'url'=>array('view', 'id'=>$model->IdCita)),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Visitas <?php echo $model->IdCita; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>