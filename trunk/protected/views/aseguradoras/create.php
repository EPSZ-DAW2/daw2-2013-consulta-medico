<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradoras'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Aseguradoras', 'url'=>array('index')),
	array('label'=>'Administrar Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Crear Aseguradoras</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>