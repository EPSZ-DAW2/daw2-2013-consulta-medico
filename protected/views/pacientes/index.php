<?php
/* @var $this PacientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Pacientes', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);

?>
<h1>Pacientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'cssFile' => false,
	'pager' => array (
		'cssFile'=> false
	),
)); ?>
