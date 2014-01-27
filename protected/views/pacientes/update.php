<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->IdPaciente=>array('view','id'=>$model->IdPaciente),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pacientes', 'url'=>array('index')),
	array('label'=>'Create Pacientes', 'url'=>array('create')),
	array('label'=>'View Pacientes', 'url'=>array('view', 'id'=>$model->IdPaciente)),
	array('label'=>'Manage Pacientes', 'url'=>array('admin')),
);
?>

<h1>Update Pacientes <?php echo $model->IdPaciente; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>