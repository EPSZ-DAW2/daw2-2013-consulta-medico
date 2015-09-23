<?php
/* @var $this PerfilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Perfiles',
);

$this->menu=array(
	array('label'=>'Crear Perfiles', 'url'=>array('create'), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin'), 'visible'=>$this->esPerfil('sysadmin')),
);
?>

<h1>Perfiles</h1>
<h1>Ruta: <?php echo $this->getRoute();?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'cssFile' => false,
	'pager' => array (
	'cssFile'=> false
	),
)); ?>
