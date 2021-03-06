<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->IdCita,
);

$this->menu=array(
	array('label'=>'Listar Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Actualizar Visitas', 'url'=>array('update', 'id'=>$model->IdCita), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Borrar Visitas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCita),'confirm'=>'Está seguro que desea eliminar este registro?'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Ver Visitas #<?php echo $model->IdCita; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile'=>false,
	'attributes'=>array(
		'IdCita',
		'paciente.DNI_NIF',
		'Fecha',
		'Hora',
		'Notas',
		'Estado',
	),
)); 
?>

<h1>Ver Pruebas #<?php echo $model->IdCita; ?></h1>
<?php 
$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'../pruebas/_view',
			//'viewData'=>array('fecha'=>$fechas),
		)); 
?>
