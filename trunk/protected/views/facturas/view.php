<?php
$this->breadcrumbs=array('Facturas'=>array('index'),'Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero,);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Actualizar Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>array('update', 'id'=>$model->IdFactura), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Borrar Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'¿Está seguro de que desea eliminar esta factura?'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Generar PDF', 'url'=>array('Pdf', 'id'=>$model->IdFactura), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Factura <?php echo $model->IdFactura.'-'.$model->Serie.'-'.$model->Numero; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => false,
	'attributes'=>array(
		array('label' => 'Factura','value' => $model->IdFactura.'-'.$model->Serie.'-'.$model->Numero),
		'Fecha',
		array('label' => 'DNI/NIF','value' => $model->paciente->DNI_NIF),
		'Concepto',
		array('label' => 'Importe','value' => $model->Importe.' €'),
		'FechaCobro',
		'Notas',
	),
)); ?>
