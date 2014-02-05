<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
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

<?php
	if(Yii::app()->user->hasFlash('mail'))
	{
		echo Yii::app()->user->getFlash('mail');
		echo CHtml::beginForm();?>
		<div class="action">
			<?php echo CHtml::submitButton('Volver',array('name' => 'volver')); ?>
		</div>
		<?php echo CHtml::endForm();
	}
	else
	{
	

?>	

<p>
Puedes utilizar operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de búsqueda para especificar como debe ser hecha la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<div id='AjFlash' class="flash-success" style="display:none"></div>
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));

?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visitas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>false,
	'pager' => array('cssFile'=>false),
	'columns'=>array(
		array('name'=>'IdCita', 'headerHtmlOptions'=>array('class'=>'span-1')),
		array('name'=>'paciente.Nombre', 'headerHtmlOptions'=>array('class'=>'span-2')),
		array( 'name'=>'Fecha', 'value'=>'(strtotime($data->Fecha)==0 ? "" : date("d-m-Y", strtotime($data->Fecha)))'),
		array( 'name'=>'Hora', 'value'=>'(strtotime($data->Hora)==0 ? "" : date("H:i:s", strtotime($data->Hora)))'),
		'Notas',
		'Estado',
		array(
			'class' => 'CButtonColumn',
			'headerHtmlOptions'=>array('class'=>'span-2'),
			'template' =>  '{view}{update}{delete}{email}',
			'buttons'=>array(
					'email' => array('label'=>'Enviar email recordatorio',
									 'imageUrl'=>Yii::app()->request->baseUrl.'/css/e-mail.png',
									 'url'=>'Yii::app()->controller->createUrl("mail",array("fecha"=>date("d-m-Y", strtotime($data->Fecha)),"hora"=>date("H:i:s", strtotime($data->Hora)),"correo"=>$data->IdPaciente,))',
									 'visible'=>'(strcmp($data->Estado,"No Realizada"))==0',)
		),
		),
)));} ?>
