<?php
$this->breadcrumbs=array('Facturas'=>array('index'),'Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero,);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Actualizar Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Borrar Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	array('label'=>'Generar PDF', 'url'=>array('Pdf', 'id'=>$model->IdFactura)),
);
?>

<h1>Factura <?php echo $model->IdFactura.'-'.$model->Serie.'-'.$model->Numero; ?></h1>

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
