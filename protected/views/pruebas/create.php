<?php
/* @var $this PruebasController */
/* @var $model Pruebas */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	'Crear prueba',
);

$this->menu=array(
	array('label'=>'Listar Pruebas', 'url'=>array('index')),
	array('label'=>'Gestionar Pruebas', 'url'=>array('admin')),
);
?>

<h1>Crear prueba</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<div>
<iframe width="760" height="800" src="<?php 
	//echo '/svn/index.php?r=pruebas/plantilla';
	echo $this->createUrl( 'plantilla');
	//$this->createUrl( 'facturas/admin');
?>" scrolling="no" frameborder="no" ></iframe>
</div> 
<?php/*<table border="1" bgcolor="#FFFFFF">
<tr>
<div style="background-color:white", "color: black; >
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Plantilla Factura</title>
    <link rel="stylesheet" type="text/css" href="./Factura/PlantillaFactura/target.css" />
    <!--[if IE]><script type="text/javascript" src="./target/excanvas-compiled.js"></script><![endif]-->
    <script type="text/javascript" src="./Factura/PlantillaFactura/target.js"> </script>
  </head>
  <body>
    <div style="margin:1ex;">
      <div style="width:100%">
        <table style="border:0;width:100%;">
          <tbody>
            <tr>
              <td bgcolor="eeeeee" align="right">
                <font face="arial,sans-serif">
                  <b>Page 1</b>
                </font>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php /*<div style="position:relative;width:595pt;height:842pt;">
        <div style="position:absolute;left:0pt;top:0pt;width:100%;height:100%;clip:rect(0pt,595pt,842pt,0pt);" class="fmt-1"><span style="white-space:pre;"><div style="position:absolute;top:246.72pt;left:381.07pt;z-index:36;letter-spacing:.035em;">tal</div></span><span style="white-space:pre;"><div style="position:absolute;top:246.72pt;left:402.14pt;z-index:38;letter-spacing:.008em;">Pobl</div></span><span style="white-space:pre;"><div style="position:absolute;top:246.72pt;left:423.43pt;z-index:39;letter-spacing:.091em;">ac</div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:389.01pt;z-index:139;letter-spacing:-.056em;">..</div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:402.38pt;z-index:141;letter-spacing:-.056em;">..</div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:412.45pt;z-index:143;letter-spacing:-.056em;">..</div></span><span class="fmt-0" style="white-space:pre;"><div style="position:absolute;top:38.42pt;left:56.8pt;z-index:1;letter-spacing:-.021em;">NOMBRE DEL MÉDICO</div></span><span class="fmt-0" style="white-space:pre;"><div style="position:absolute;top:50.72pt;left:56.8pt;z-index:2;letter-spacing:-.028em;">NIF DEL MÉDICO: </div></span><span style="white-space:pre;"><div style="position:absolute;top:62.92pt;left:56.8pt;z-index:7;letter-spacing:.004em;">DIRECCIÓN:</div></span><span style="white-space:pre;"><div style="position:absolute;top:75.22pt;left:56.8pt;z-index:16;letter-spacing:-.017em;">Nº Factura: SERIE / NUM</div></span><span style="white-space:pre;"><div style="position:absolute;top:87.42pt;left:56.8pt;z-index:23;letter-spacing:.008em;">Fecha: DD-MM-AAAA</div></span><span style="white-space:pre;"><div style="position:absolute;top:222.22pt;left:340.4pt;z-index:27;letter-spacing:-.015em;">NOMBRE: </div></span><span style="white-space:pre;"><div style="position:absolute;top:234.42pt;left:340.4pt;z-index:32;letter-spacing:.014em;">Domicilio</div></span><span style="white-space:pre;"><div style="position:absolute;top:246.72pt;left:340.4pt;z-index:35;letter-spacing:.004em;">Cod.Pos</div></span><span style="white-space:pre;"><div style="position:absolute;top:258.92pt;left:340.4pt;z-index:43;letter-spacing:.019em;">Provincia</div></span><span style="white-space:pre;"><div style="position:absolute;top:271.22pt;left:340.4pt;z-index:46;letter-spacing:-.04em;">NIF:</div></span><span class="fmt-2" style="white-space:pre;"><div style="position:absolute;top:313.79pt;left:56.8pt;z-index:49;letter-spacing:-.005em;">CONCEPTO</div></span><span style="white-space:pre;"><div style="position:absolute;top:342.92pt;left:56.8pt;z-index:66;letter-spacing:.007em;">Honorarios profesionales por la realización de:</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:92.3pt;z-index:67;letter-spacing:-.176em;">- </div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:98.39pt;z-index:68;letter-spacing:.008em;">Cons</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:122.97pt;z-index:69;letter-spacing:-.001em;">ul</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:131.16pt;z-index:70;letter-spacing:.026em;">ta </div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:144.05pt;z-index:71;letter-spacing:-.035em;">(1ª</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:159.73pt;z-index:72;letter-spacing:-.043em;">vis</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:171.12pt;z-index:73;letter-spacing:-.041em;">i</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:173.21pt;z-index:74;letter-spacing:.064em;">ta</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:186.09pt;z-index:75;letter-spacing:.021em;">/</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:190.48pt;z-index:76;letter-spacing:-.024em;"> revis</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:214.06pt;z-index:77;letter-spacing:-.041em;">i</div></span><span style="white-space:pre;"><div style="position:absolute;top:367.02pt;left:216.15pt;z-index:78;letter-spacing:.016em;">ón)</div></span><span style="white-space:pre;"><div style="position:absolute;top:391.02pt;left:92.3pt;z-index:87;letter-spacing:.016em;">- Electrocardiograma</div></span><span style="white-space:pre;"><div style="position:absolute;top:415.12pt;left:92.3pt;z-index:99;letter-spacing:.018em;">- Ecocardiograma transtorácico</div></span><span style="white-space:pre;"><div style="position:absolute;top:439.12pt;left:92.3pt;z-index:106;letter-spacing:-.028em;">- Holter E.C.G.</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:92.3pt;z-index:107;letter-spacing:-.176em;">- </div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:98.39pt;z-index:108;letter-spacing:.106em;">M</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:107.58pt;z-index:109;letter-spacing:.011em;">oni</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:122.26pt;z-index:110;letter-spacing:.029em;">to</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:132.05pt;z-index:111;letter-spacing:-.037em;">ri</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:137.14pt;z-index:112;letter-spacing:.037em;">zac</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:154.63pt;z-index:113;letter-spacing:.004em;">ión</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:169.32pt;z-index:114;letter-spacing:.044em;"> am</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:188.31pt;z-index:115;letter-spacing:.021em;">bul</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:203.2pt;z-index:116;letter-spacing:.121em;">a</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:210.09pt;z-index:117;letter-spacing:.029em;">to</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:219.88pt;z-index:118;letter-spacing:.016em;">ria</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:231.77pt;z-index:119;letter-spacing:.009em;"> d</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:241.36pt;z-index:120;letter-spacing:-.004em;">e l</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:252.64pt;z-index:121;letter-spacing:.007em;">a pres</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:282.32pt;z-index:122;letter-spacing:-.041em;">i</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:284.41pt;z-index:123;letter-spacing:-.001em;">ón </div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:299.79pt;z-index:124;letter-spacing:.042em;">ar</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:309.68pt;z-index:125;letter-spacing:.045em;">te</div></span><span style="white-space:pre;"><div style="position:absolute;top:463.22pt;left:319.47pt;z-index:126;letter-spacing:.001em;">rial</div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:305pt;z-index:138;letter-spacing:-.043em;">Total:................</div></span><span style="white-space:pre;"><div style="position:absolute;top:610.32pt;left:281.5pt;z-index:152;letter-spacing:-.013em;">FECHA</div></span><span style="white-space:pre;"><div style="position:absolute;top:666.52pt;left:236.7pt;z-index:162;letter-spacing:.024em;">Fdo: Nombre del médico</div></span><span style="white-space:pre;"><div style="position:absolute;top:246.72pt;left:396.05pt;z-index:37;letter-spacing:-.176em;">- </div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:395.7pt;z-index:140;letter-spacing:-.056em;">..</div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:409.06pt;z-index:142;letter-spacing:-.054em;">.</div></span><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:419.13pt;z-index:144;letter-spacing:-.056em;">..</div></span><span style="white-space:pre;"><div style="position:absolute;top:246.72pt;left:436.62pt;z-index:40;letter-spacing:.004em;">ión</div></span><canvas id="_canv_1" style="position:absolute;left:56.1pt;top:326.3pt;width:78.1pt;height:1.4pt;z-index:50;" width="104.13" height="1.8667">Your browser does not support the canvas tag!</canvas><span class="fmt-3" style="white-space:pre;"><div style="position:absolute;top:511.6pt;left:432.58pt;z-index:150;letter-spacing:-.028em;">9.999,99 Euros</div></span></div>
      </div>
      <script type="text/javascript">DrawPage1();</script> */?>
	<!--<center>
		<Embed src="<?php echo Yii::app()->request->baseUrl; ?>/Plantillas/PlantillaFactura.html" width = "900" height = "1000">
	</center>-->
    </div>
  </body>
</html>
</div>
</tr>
</table>