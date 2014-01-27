<?php
/* @var $this VisitasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Visitas',
);

$this->menu=array(
	array('label'=>'Create Visitas', 'url'=>array('create')),
	array('label'=>'Manage Visitas', 'url'=>array('admin')),
);
?>

<h1>Visitases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
