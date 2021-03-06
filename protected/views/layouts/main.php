<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mbmenu_css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mbmenu_css/mbmenu.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/gridview/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/listview/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/detailview/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css">


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="imagen_portada"><img src= "<?php echo Yii::app()->request->baseUrl; ?>/css/hospital.png" /></div>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('ext.mbmenu.MbMenu',array(
            'activateParents'=>true,
			'baseUrl' => Yii::app()->baseUrl.'/css/mbmenu_css',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Perfiles', 'url'=>array('/perfiles/index'),'visible'=>!Yii::app()->user->isGuest && (!$this->esPerfil('paciente') && !$this->esPerfil('medico') && !$this->esPerfil('auxiliar'))),
				array('label'=>'Usuarios', 'url'=>array('/usuarios/index'),'visible'=>!Yii::app()->user->isGuest && (!$this->esPerfil('paciente') && !$this->esPerfil('medico') && !$this->esPerfil('auxiliar'))),
                array('label'=>'Gestion Medica', 'visible'=>!Yii::app()->user->isGuest,   
                  'items'=>array(
                    array('label'=>'Pruebas', 'url'=>array('/pruebas/index')),
					array('label'=>'Visitas', 'url'=>array('/visitas/index')),
					array('label'=>'Facturas', 'url'=>array('/facturas/index')),
					array('label'=>'Aseguradoras','url'=>array('/aseguradoras/index')),
					array('label'=>'Pacientes', 'url'=>array('/pacientes/index')),
                  ),
                ),
				array('label'=>'Copia de Seguridad', 'visible'=>!Yii::app()->user->isGuest && (!$this->esPerfil('paciente') && !$this->esPerfil('medico') && !$this->esPerfil('auxiliar')),   
                  'items'=>array(
                    array('label'=>'Importar', 'url'=>array('/importar/index')),
					array('label'=>'Exportar', 'url'=>array('/exportar/index')),
                  ),
                ),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
    )); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Universidad de Salamanca.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
		<?php //echo Yii::app()->bootstrap->register(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
