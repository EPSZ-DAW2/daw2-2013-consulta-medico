<?php
Yii::import("zii.widgets.jui.CJuiAutoComplete");
class AutoCompletar extends CJuiAutoComplete{
    public $methodChain;

    public function run(){
        list($name,$id)=$this->resolveNameID();
 
        if(isset($this->htmlOptions['IdPaciente']))
            $id=$this->htmlOptions['IdPaciente'];
        else
            $this->htmlOptions['IdPaciente']=$id;
 
        if(isset($this->htmlOptions['DNI_NIF']))
            $name=$this->htmlOptions['DNI_NIF'];
 
        if($this->hasModel())
            echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);
        else
            echo CHtml::textField($name,$this->value,$this->htmlOptions);
 
        if($this->sourceUrl!==null)
            $this->options['source']=CHtml::normalizeUrl($this->sourceUrl);
        else
            $this->options['source']=$this->source;
 
        $options=CJavaScript::encode($this->options);
 
        $js = "jQuery('#{$id}').autocomplete($options){$this->methodChain};";
 
        $cs = Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id, $js);
    }
}