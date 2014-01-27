<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->IdFactura=>array('view','id'=>$model->IdFactura),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
	array('label'=>'Ver Facturas', 'url'=>array('view', 'id'=>$model->IdFactura)),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Facturas <?php echo $model->IdFactura; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>