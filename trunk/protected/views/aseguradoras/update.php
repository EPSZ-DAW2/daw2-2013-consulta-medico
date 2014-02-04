<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradoras'=>array('index'),
	$model->idAseguradora=>array('view','id'=>$model->idAseguradora),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Aseguradoras', 'url'=>array('index')),
	array('label'=>'Crear Aseguradoras', 'url'=>array('create')),
	array('label'=>'Ver Aseguradoras', 'url'=>array('view', 'id'=>$model->idAseguradora)),
	array('label'=>'Administrar Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Actualizar Aseguradoras <?php echo $model->idAseguradora; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>