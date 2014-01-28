<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#facturas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Facturas</h1>

<p>
Puedes utilizar operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de búsqueda para especificar como debe ser hecha la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdFactura',
		'Serie',
		'Numero',
		'Fecha',
		'IdPaciente',
		'Concepto',
		/*
		'Importe',
		'FechaCobro',
		'Notas',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>