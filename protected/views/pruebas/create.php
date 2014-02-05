<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	'Crear prueba',
);

$this->menu=array(
	array('label'=>'Listar Pruebas', 'url'=>array('index')),
	array('label'=>'Gestionar Pruebas', 'url'=>array('admin')),
);
?>

<h1>Crear prueba</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>


    