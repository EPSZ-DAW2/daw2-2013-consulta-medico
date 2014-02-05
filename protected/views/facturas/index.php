<?php
/* @var $this FacturasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturas',
);

$this->menu=array(
	array('label'=>'Crear Factura', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Facturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'cssFile' => false,
	'pager' => array (
	'cssFile'=> false
	),
)); ?>
