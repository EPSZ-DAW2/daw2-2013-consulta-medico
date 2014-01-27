<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->IdPaciente=>array('view','id'=>$model->IdPaciente),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Crear Pacientes', 'url'=>array('create')),
	array('label'=>'Ver Pacientes', 'url'=>array('view', 'id'=>$model->IdPaciente)),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Pacientes <?php echo $model->IdPaciente; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>