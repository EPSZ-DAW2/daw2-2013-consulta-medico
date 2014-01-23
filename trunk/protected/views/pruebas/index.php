<?php
/* @var $this PruebasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pruebas Médicas',
);

$this->menu=array(
	array('label'=>'Crear Pruebas', 'url'=>array('create')),
	array('label'=>'Gestionar Pruebas', 'url'=>array('admin')),
);
?>

<h1>Pruebas Médicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
