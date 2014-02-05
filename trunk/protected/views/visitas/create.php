<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Visitas', 'url'=>array('index')),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Crear Visitas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>