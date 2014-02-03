<?php
/* @var $this VisitasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Visitas',
);

$this->menu=array(
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Gestionar Visitas', 'url'=>array('admin')),
);
?>

<h1>Visitas</h1>
<div class="row">
 <?php echo $form->labelEx($model,'fecha'); ?>
 <?php
 if ($model->fecha!='') {
 $model->fecha=date('d-m-Y',strtotime($model->fecha));
 }
 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
 'model'=>$model,
 'attribute'=>'fecha',
 'value'=>$model->fecha,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->fecha,
 'dateFormat'=>'dd-mm-yy',
 'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 'buttonImageOnly'=>true,
 'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )); ?>
 <?php echo $form->error($model,'fecha'); ?>
 </div>
<?php
/*$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-Inline',
    'flat'=>true,//remove to hide the datepicker
	'language' => 'es',
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
		'dateFormat' => 'dd-mm-yyyy',
    ),
    'htmlOptions'=>array(
    ),
));*/
?>

<?php 
/*$this->widget('ecalendarview.ECalendarView', array(
 'cssFile' => 'css/calendario/styles.css',
 'id'=>'calendarioVisitas',
 'weeksInRow' => 1,
 'ajaxUpdate' => true,
  'dataProvider' => array(
    'pagination' => array(
      'currentDate' => new DateTime("now"),
      'pageSize' => 'month',
      'pageIndex' => 1,
      'pageIndexVar' => 'MyCalendar_page',
      'isMondayFirst' => true,
    )
  ),
  'itemView' => array(
	'DateTime'=> $data->date,
	),
));*/ ?>