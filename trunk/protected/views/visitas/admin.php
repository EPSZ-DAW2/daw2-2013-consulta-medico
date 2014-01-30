<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#visitas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Visitas</h1>

<p>
Puedes utilizar operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de búsqueda para especificar como debe ser hecha la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
	echo Yii::app()->request->baseUrl.'/protected/views/visitas/' ;?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visitas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdCita',
		'IdPaciente',
		'Fecha_hora',
		'Notas',
		'Estado',
		array(
            'class' => 'CButtonColumn',
			'template' => '{view}{update}{delete}{email}',
            'buttons'=>array(
				'email' => array( //botón para la acción nueva
					'label'=>'Enviar email recordatorio', // titulo del enlace del botón nuevo
					'imageUrl'=>Yii::app()->request->baseUrl.'/protected/views/visitas/e-mail.png', //ruta icono para el botón
					'url'=>'Yii::app()->createUrl("/mail.php?id=$data->id" )', //url de la acción nueva
		    )
		),
        ),
))); ?>
