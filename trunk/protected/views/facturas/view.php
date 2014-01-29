<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturases'=>array('index'),
	$model->IdFactura,
);

$this->menu=array(
	array('label'=>'List Facturas', 'url'=>array('index')),
	array('label'=>'Create Facturas', 'url'=>array('create')),
	array('label'=>'Update Facturas', 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Delete Facturas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Facturas', 'url'=>array('admin')),
	array('label'=>'Generar PDF', 'url'=>array('')),
);
?>

<h1>View Facturas #<?php echo $model->IdFactura; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdFactura',
		'Serie',
		'Numero',
		'Fecha',
		'IdPaciente',
		'Concepto',
		'Importe',
		'FechaCobro',
		'Notas',
	),
)); ?>
