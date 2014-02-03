
<?php


class Calendario extends CFormModel
{
	public $fechaVisita;
	 
	public function rules()
	{
		return array(array('fechaVisita', 'required'),);
	}
}
