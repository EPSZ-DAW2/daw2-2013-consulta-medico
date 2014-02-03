<?php
$this->breadcrumbs=array('Facturas'=>array('index'),$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero=>array('view','id'=>$model->IdFactura),'Actualizar',);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Ver Factura '.$model->IdFactura.'-'.$model->Serie.'-'.$model->Numero, 'url'=>array('view', 'id'=>$model->IdFactura)),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	array('label'=>'Generar PDF', 'url'=>array('')),
);
?>

<h1>Actualizar Factura <?php echo $model->IdFactura.'-'.$model->Serie.'-'.$model->Numero; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>