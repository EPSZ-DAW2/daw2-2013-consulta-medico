<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->IdPerfil=>array('view','id'=>$model->IdPerfil),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar perfiles', 'url'=>array('index')),
	array('label'=>'Crear perfil', 'url'=>array('create')),
	array('label'=>'Ver perfiles', 'url'=>array('view', 'id'=>$model->IdPerfil)),
	array('label'=>'Administrar perfiles', 'url'=>array('admin')),
);
?>

<h1>Update Perfiles <?php echo $model->IdPerfil; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>