<?php


class ParentModel extends DataMapper{
    
    protected  $CI;
    protected  $ViewPath='';
    
    function __construct($id = NULL) {
        parent::__construct($id);
        
        $this->CI = & get_instance();
        
    }
    
    
    function editLink($label="")
    {
        return "#";
    }
    
    function newLink()
    {
        
        return "#";
        
    }
    function formAction()
    {
        
        return '';
        
    }
    
    function returnPage()
    {
        return site_url("catalogs/process/states/");
        
    }
    
    function viewPath()
    {
        return $this->ViewPath;
        
    }
    
    
    function searchFormAction()
    {
        
        return site_url("");
        
    }
    
    
    function toJson()
    {
        
        $a[]="Hola";
        $a[]="Mundo";
        
        return json_encode($a);
        
        
        
    }
    
    
    
    function list_options($model,$selected='0')
    {
        $selected = intval($selected);
        
        $l='';
        $m = new $model();
        
        foreach($m->get()->all as $option)
        {
            $sel='';
           
            if ($option->id==$selected){
           
            $sel  = 'selected = "selected" ';    
            }
            $l.="<option value='{$option->id}' $sel>$option->nombre</option>";
        }
            
        return $l;
    }
}