<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin'), 'visible'=>$this->esPerfil('sysadmin')),
);
?>

<h1>Crear Usuarios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>