<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	'Gestión de pruebas',
);

$this->menu=array(
	array('label'=>'Listar Pruebas', 'url'=>array('index')),
	array('label'=>'Crear Pruebas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pruebas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Pruebas</h1>

<p>
Puedes introducir un operador comparacional (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada búsqueda para especificar como debe realizarse la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pruebas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdPrueba',
		'IdCita',
		'IdPaciente',
		'IdTipoDiagnostico',
		'Fecha_Hora',
		'Descripcion',
		/*
		'Tratamiento',
		'Notas',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'cssFile' => false,
	'pager' => array (
	'cssFile'=> false
	),
)); ?>
