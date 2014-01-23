<?php
/* @var $this PruebasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pruebases',
);

$this->menu=array(
	array('label'=>'Create Pruebas', 'url'=>array('create')),
	array('label'=>'Manage Pruebas', 'url'=>array('admin')),
);
?>

<h1>Pruebases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
