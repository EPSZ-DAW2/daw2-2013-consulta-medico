<?php
/* @var $this PerfilesController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->IdFactura,
);

$this->menu=array(
	array('label'=>'Listar facturas', 'url'=>array('index')),
	array('label'=>'Crear factura', 'url'=>array('create')),
	array('label'=>'Actualizar facturas', 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Eliminar factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar facturas', 'url'=>array('admin')),
);
?>

<h1>Resumen factura creado #<?php echo $model->IdFactura; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdFactura',
		
	),
)); ?>
