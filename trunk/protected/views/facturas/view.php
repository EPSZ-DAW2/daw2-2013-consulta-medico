<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturases'=>array('index'),
	$model->IdFactura,
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
	array('label'=>'Actualizar Facturas', 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Borrar Facturas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	array('label'=>'Generar PDF', 'url'=>array('Pdf', 'id'=>$model->IdFactura)),
);
?>

<h1>Ver Facturas #<?php echo $model->IdFactura; ?></h1>

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
