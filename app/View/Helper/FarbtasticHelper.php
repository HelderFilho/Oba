<?php 
class FarbtasticHelper extends Helper  { 
    var $helpers = array('Javascript', 'Html');  
    /** 
    *    Add the JS/CSS to your header  
    *     
    */ 
    function includeHead() { 
        $str = ''; 
        $str .= $this->Html->script('farbtastic'); 
        $str .= $this->Html->css('farbtastic'); 
        return $str; 
    }
    function input($name, $label='') { 
        $icon_file = '../img/icon/color.png'; // update to wherever your icon is. 
        list($model, $fieldname) = split('\.', $name); 
        if (empty($label)) { 
            $label = Inflector::Humanize($fieldname); 
        } 
        if(isset($this->data[$model][$fieldname])) { 
            $color_value = str_replace("#", "", $this->data[$model][$fieldname]); // expects an RGB string, strips any incoming '#' character 
        } 
        else { 
            $color_value = "000000"; // black 
        } 
      $str = ''; 
      $str .= '<div class="input text colorpicker">'; 
      $str .= '<label for="'.$model.Inflector::Camelize($fieldname).'">'.$label.'</label>';      $str .= '<input name="data['.$model.']['.$fieldname.']" type="text" maxlength="7" value="#'.$color_value.'" id="'.$model.Inflector::Camelize($fieldname).'" class="farbtastic-input" />'; 
      $str .= '<img id="farbtastic-picker-icon-'.Inflector::Camelize($fieldname).'" src="'.$icon_file.'" alt="Color Picker" title="Color Picker" class="farbtastic-picker-icon">'; 
      $str .= '<div style="display:none;" class="farbtastic-picker" id="farbtastic-picker-'.Inflector::Camelize($fieldname).'"></div>'; 
      $str .= '</div>'; 
      return $str; 
    } 
    /** 
    *    Add the jQuery magic to the $(document).ready function 
    *    Farbtastic-ize the input, make the button show/hide the color picker div 
    */
function readyJS($name) { 
        list($model,$fieldname) = split('\.',$name); 
        $str = ''; 
        $str .= ' $("#farbtastic-picker-'.Inflector::Camelize($fieldname).'").farbtastic("#'.$model.Inflector::Camelize($fieldname).'"); '; 
        $str .= ' $("#farbtastic-picker-icon-'.Inflector::Camelize($fieldname).'").click( function() { $("#farbtastic-picker-'.Inflector::Camelize($fieldname).'").toggle("slow"); }); '; 
       return $str; 
    } 
}?>