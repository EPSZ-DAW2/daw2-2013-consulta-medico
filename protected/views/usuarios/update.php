<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->IdUsuario=>array('view','id'=>$model->IdUsuario),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create'), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Ver Usuarios', 'url'=>array('view', 'id'=>$model->IdUsuario)),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin'), 'visible'=>$this->esPerfil('sysadmin')),
);
?>

<h1>Actualizar Usuarios <?php echo $model->usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>