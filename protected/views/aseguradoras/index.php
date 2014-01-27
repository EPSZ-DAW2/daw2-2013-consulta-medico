<?php
/* @var $this AseguradorasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aseguradorases',
);

$this->menu=array(
	array('label'=>'Create Aseguradoras', 'url'=>array('create')),
	array('label'=>'Manage Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Aseguradorases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
