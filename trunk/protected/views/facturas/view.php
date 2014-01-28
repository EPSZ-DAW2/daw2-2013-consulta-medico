<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->IdFactura,
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
	array('label'=>'Actualizar Facturas', 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Eliminar Facturas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'¿Estas seguro de que deseas eliminar esta factura?')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	 array('label'=>'Crear PDF', 'url'=>array('pdf','id'=>$model->id)),
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
