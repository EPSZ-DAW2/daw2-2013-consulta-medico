<?php
/* @var $this PacientesController */
/* @var $model Pacientes */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	//'cssFile' => false,
	$model->IdPaciente=>array('view','id'=>$model->IdPaciente),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Crear Pacientes', 'url'=>array('create')),
	array('label'=>'Ver Pacientes', 'url'=>array('view', 'id'=>$model->IdPaciente)),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Paciente: <?php echo $model->DNI_NIF; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>