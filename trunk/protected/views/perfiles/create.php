<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Perfiles', 'url'=>array('index')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin')),
);
?>

<h1>Crear Perfiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>