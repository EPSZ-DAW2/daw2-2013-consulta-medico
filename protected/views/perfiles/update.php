<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Perfiles', 'url'=>array('index')),
	array('label'=>'Crear Perfiles', 'url'=>array('create'), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Ver Perfiles', 'url'=>array('view', 'id'=>$model->name), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin'), 'visible'=>$this->esPerfil('sysadmin')),
);
?>

<h1>Actualizar Perfiles <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>