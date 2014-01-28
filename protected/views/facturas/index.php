<?php
/* @var $this FacturasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturas',
);

$this->menu=array(
	array('label'=>'Crear Facturas', 'url'=>array('create')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	 array('label'=>'Crear PDF', 'url'=>array('pdf','id'=>$model->id)),
);
?>

<h1>Facturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
