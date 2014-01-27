<?php
/* @var $this AseguradorasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aseguradoras',
);

$this->menu=array(
	array('label'=>'Crear Aseguradoras', 'url'=>array('create')),
	array('label'=>'Administrar Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Aseguradoras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
