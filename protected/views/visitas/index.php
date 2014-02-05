<?php
/* @var $this VisitasController */
/* @var $model CActivemodel Calendario */
/* @var $dataProvider Filtro de busqueda */

$this->breadcrumbs=array(
	'Visitas',
);

$this->menu=array(
	array('label'=>'Crear Visitas', 'url'=>array('create'), 'visible'=>!$this->esPerfil('paciente')),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin'), 'visible'=>!$this->esPerfil('paciente')),
);
?>

<h1>Visitas</h1>
<?php if(!isset($dataProvider)){
 echo CHtml::beginForm();

	
		 if ($model->fechaVisita!='') {
		 $model->fechaVisita=date('d-m-Y',strtotime($model->v));
		 }
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'model'=>$model,
		 'attribute'=>'fechaVisita',
		 'flat'=>true,
		 'value'=>$model->fechaVisita,
		 'language' => 'es',
		 'htmlOptions' => array('readonly'=>"readonly"),
		 'options'=>array(
		 'autoSize'=>true,
		 'defaultDate'=>$model->fechaVisita,
		 'dateFormat'=>'yy-mm-dd',
		 'buttonImage'=>Yii::app()->baseUrl.'/css/calendar1.jpg',
		 'buttonImageOnly'=>true,
		 'buttonText'=>'Fecha',

		 'showAnim'=>'fold',
		 'showButtonPanel'=>true,
		 'showOn'=>'button',
		 'showOtherMonths'=>true,
		 'changeMonth' => 'true',
		 'changeYear' => 'true',
		 ),
		 )); ?>

<div class="action">
	<?php echo CHtml::submitButton('Cargar',array('name' => 'fecha')); ?>
</div>
<?php echo CHtml::endForm(); 
}
?>

<?php 
if(isset($dataProvider)){
	if(Yii::app()->user->hasFlash('informacionVisitas')){
		echo Yii::app()->user->getFlash('informacionVisitas');
	}else{
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			//'viewData'=>array('fecha'=>$fechas),
		));
	}
echo CHtml::beginForm();?>
<div class="action">
	<?php echo CHtml::submitButton('Volver a calendario',array('name' => 'volver')); ?>
</div>
<?php echo CHtml::endForm(); 

} ?>
