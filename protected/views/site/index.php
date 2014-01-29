<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
//$idusuario=Yii::app()->user->getState('FechaHoraUltimaConexion');
//echo $idusuario;
?>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1><p>
<?php if (!Yii::app()->user->isGuest){ echo "Su última sesión fue el "; echo CHtml::encode(Yii::app()->user->getState('FechaHoraUltimaConexion'));} ?> 

