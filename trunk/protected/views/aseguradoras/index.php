<?php
/* @var $this AseguradorasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aseguradoras',
);

$this->menu=array(
	array('label'=>'Crear Aseguradoras', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Administrar Aseguradoras', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Aseguradoras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'cssFile' => false,
	'pager' => array (
		'cssFile'=> false
	)
)); ?>
