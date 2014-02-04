<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradoras'=>array('index'),
	$model->idAseguradora,
);

$this->menu=array(
	array('label'=>'Lista de Aseguradoras', 'url'=>array('index')),
	array('label'=>'Crear Aseguradoras', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Actualizar Aseguradoras', 'url'=>array('update', 'id'=>$model->idAseguradora), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Eliminar Aseguradoras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAseguradora),'confirm'=>'¿Está seguro que desea eliminar la aseguradora?'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Administrar Aseguradoras', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Aseguradora "<?php echo $model->Nombre; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => false,
	'attributes'=>array(
		'idAseguradora',
		'Nombre',
		'Notas',
	),
)); ?>
