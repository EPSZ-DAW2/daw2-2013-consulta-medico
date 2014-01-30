<?php
/* @var $this CdsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cds',
);

$this->menu=array(
	array('label'=>'Create Cds', 'url'=>array('create')),
	array('label'=>'Manage Cds', 'url'=>array('admin')),
);
?>

<h1>Cds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
