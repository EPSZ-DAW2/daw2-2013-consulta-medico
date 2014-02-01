<?php

class ImportarController extends Controller
{
	public function actionIndex()
	{
	
		$plantilla=new ImportarForm;
		
		$this->render('index', array(
		'plantilla'=>$plantilla,
		));
	}
	


}