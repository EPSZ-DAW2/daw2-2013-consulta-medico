<?php
$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index'),),
	array('label'=>'Crear Factura', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
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

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile' => false,
	'pager' => array (
	'cssFile'=> false
	),
	'columns'=>array(
		array('name'=>'IdFactura', 'headerHtmlOptions'=>array('class'=>'span-1')),
		array('name'=>'Serie', 'headerHtmlOptions'=>array('class'=>'span-1')),
		array('name'=>'Numero', 'headerHtmlOptions'=>array('class'=>'span-1')),
		array('name'=>'Fecha', 'headerHtmlOptions'=>array('class'=>'span-2')),
		array('name'=>'paciente.DNI_NIF', 'filter'=>CHtml::activeTextField($model,'dninif'),'headerHtmlOptions'=>array('class'=>'span-2')),
		'Concepto',
		array('name'=>'Importe', 'headerHtmlOptions'=>array('class'=>'span-2')),
		array('name'=>'FechaCobro', 'headerHtmlOptions'=>array('class'=>'span-2')),
		'Notas',
		array(
				'class' => 'CButtonColumn',
				'template' => '{view}{update}{delete}{pdf}',
				'buttons'=>array(
						'pdf' => array('label'=>'Crear Pdf','imageUrl'=>Yii::app()->request->baseUrl.'/css/pdf.png','url'=>'Yii::app()->controller->createUrl("pdf",array("id"=>$data->IdFactura))',)
				),
				'headerHtmlOptions'=>array('class'=>'span-2')),
	),
)); ?>
