<?php
/* @var $this VisitasController */
/* @var $model CActivemodel */

$this->breadcrumbs=array(
	'Visitas',
);

$this->menu=array(
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin')),
);
?>

<h1>Visitas</h1>
<?php if(isset($model)){
 echo CHtml::beginForm();
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'model'=>$model,
		 'attribute'=>'fechaVisita',
		 'flat'=>true,
		 'value'=>$model->fechaVisita,
		 'language' => 'es',
		 'htmlOptions' => array('readonly'=>"readonly"),
		 'options'=>array(
		 'autoSize'=>true,
		 'defaultDate'=>date('Y-m-d', time()),
		 'dateFormat'=>'yy-mm-dd',
		 'buttonImage'=>Yii::app()->baseUrl.'/css/calendar1.jpg',
		 'buttonImageOnly'=>true,
		 'buttonText'=>'Fecha',
		 'selectOtherMonths'=>true,
		 'showAnim'=>'fold',
		 'showButtonPanel'=>true,
		 'showOn'=>'button',
		 'showOtherMonths'=>true,
		 'changeMonth' => 'true',
		 'changeYear' => 'true',
		 ),
		 )); ?>

<div class="action">
	<?php echo CHtml::submitButton('Cargar Visitas',array('name' => 'fecha')); ?>
</div>
<?php echo CHtml::endForm(); 
}
?>

<?php 
if(isset($fechas)){
	if(Yii::app()->user->hasFlash('informacion')){?>
    <div class="info">
        <h4><?php echo Yii::app()->user->getFlash('informacion'); ?></h4>
    </div>
<?php }else
		{
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData'=>array('fecha'=>$fechas),
));}
echo CHtml::beginForm();?>
<div class="action">
	<?php echo CHtml::submitButton('Volver a calendario',array('name' => 'volver')); ?>
</div>
<?php echo CHtml::endForm(); 

} ?>
