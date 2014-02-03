<?php
$this->breadcrumbs=array('Facturas'=>array('index'),'Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero,);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Actualizar Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Borrar Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'¿Está seguro de que desea eliminar este paciente?')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	array('label'=>'Generar PDF', 'url'=>array('Pdf', 'id'=>$model->IdFactura)),
);
?>

<h1>Factura <?php echo $model->IdFactura.'-'.$model->Serie.'-'.$model->Numero; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => false,
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
