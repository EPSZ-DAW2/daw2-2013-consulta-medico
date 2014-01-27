<?php
/* @var $this PerfilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Perfiles',
);

$this->menu=array(
	array('label'=>'Crear Perfiles', 'url'=>array('create')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin')),
);
?>

<h1>Perfiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
