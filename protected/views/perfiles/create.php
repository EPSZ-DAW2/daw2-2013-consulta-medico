<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Perfiles', 'url'=>array('index')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin'), 'visible'=>$this->esPerfil('sysadmin')),
);
?>

<h1>Crear perfiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>