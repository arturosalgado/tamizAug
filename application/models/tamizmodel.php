<?php


class TamizModel extends ParentModel
{
    
    public  $table = 'tamiz';
    public  $has_many = array('estadomodel');
            
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    function nombre_completo()
    {
        
        return $this->apellido_paterno. ' '.$this->apellido_materno.' '.$this->nombre;
        
    }
    function getFechadenacimiento()
    {
       // echo $this->fechadenacimiento;
        if (!empty($this->fechadenacimiento) and $this->fechadenacimiento!='0000-00-00 00:00:00')
        {
            return date('d/m/Y',  strtotime($this->fechadenacimiento));
        }
        else return '';
        
    }
    
    
     function getFechademuestra()
    {
       // echo $this->fechadenacimiento;
        if (!empty($this->fechademuestra) and $this->fechademuestra!='0000-00-00 00:00:00')
        {
            return date('d/m/Y',  strtotime($this->fechademuestra));
        }
        else return '';
        
    }
    function getHora()
    {
        
       if (!empty($this->horanacimiento) and $this->horanacimiento!='0000-00-00 00:00:00')
        {
            return date('d/m/Y',  strtotime($this->horanacimiento));
        }
        else return '';
        
    }
    
    function getToma()
    {
        
      if (!empty($this->fechademuestra) and $this->fechademuestra!='0000-00-00 00:00:00')
        {
            return date('d/m/Y',  strtotime($this->fechademuestra));
        }
        else return '';
        
    }
    
    
    function getResponsable()
    {
        
       return  'Carlos Alberto Sanchez ';
        
    }
    
    
    function listMalformaciones($selected=null)
    {
        
        $options = '';
        
        $selected_string = '';
        
        
        $m = new MalformacionModel();
        
        foreach ($m->get()->all as $mal)
        {
            $selected_string = '';
            
            if ($selected == $mal->id)
            $selected_string = 'selected = "selected"';    
            $options.= '<option  '.$selected_string.' value="'.$mal->id.'" >'.$mal->nombre.'</option>';
            
        }
        
        return $options;
        
        
        
        
        
    }
    
    
    function listGesta($selected = 1)
    {
        $options  = '';
        $selected_string = '';
        
        for($i=1; $i<16; $i++)
        {
            $selected_string = '';
            if ($selected == $i)
            $selected_string = 'selected = "selected" ';
            $options .= '<option '.$selected_string.' value="'.$i.'">'.$i.'</option>';
        }
        
        return $options;
        
    }
    
    
    function listEstados($selected=null)
    {
        
           
        $options = '';
        
        $selected_string = '';
        
        
        $m = new EstadoModel();
        
        foreach ($m->get()->all as $mal)
        {
            $selected_string = '';
            
            if ($selected == $mal->id)
            $selected_string = 'selected = "selected"';    
            $options.= '<option  '.$selected_string.' value="'.$mal->id.'" >'.$mal->nombre.'</option>';
            
        }
        
        return $options;
        
    }
    
     function listResponsable($selected=null)
    {
        
           
        $options = '';
        
        $selected_string = '';
        
        
        $m = new ResponsableModel();
        
        foreach ($m->get()->all as $mal)
        {
            $selected_string = '';
            
            if ($selected == $mal->id)
            $selected_string = 'selected = "selected"';    
            $options.= '<option  '.$selected_string.' value="'.$mal->id.'" >' .$mal->paterno. ' ' .$mal->materno.' ' .$mal->nombre.' '.'</option>';
            
        }
        
        return $options;
        
    }
    
    
    function getExcelHeaders()
    {
        $a[]="Id";
        $a[]="Folio";
        $a[]="Fecha de Nacimiento";
        $a[]="Hora de Nacimiento";
        $a[]="Sexo";
        $a[]="Edad gestacional";
        $a[]="Producto";
        $a[]="Num Gemelo";
        $a[]="Peso gms";
        $a[]="Talla cms";
        $a[]="Fecha de Muestra";
        $a[]="Hora de Muestra";
        $a[]="Malformacion";
        $a[]="Condicion";
        $a[]="Alimentacion";
        $a[]="Apellido Paterno";
        $a[]="Apellido Materno";
        $a[]="Nombre";
        $a[]="Edad Madre";
        $a[]="Gesta";
        $a[]="Enfermedad";
      
        $a[]="Domicilio";
        $a[]="Colonia";
        $a[]="Municipio";
        $a[]="Estado";
        $a[]="C.P.";
      
        $a[]="Telefono";
        $a[]="Tecnica";
        $a[]="Responsable";
        $a[]="Estatus";
        $a[]="Malformacion";
        $a[]="THS";
        $a[]="THS Valor";
        $a[]="PKU";
        $a[]="PKU Valor";
        $a[]="Oh17";
        $a[]="Oh17 Valor";
        $a[]="Gal";
        $a[]="Gal Valor";
        $a[]="Estado Clinica";
        $a[]="Unidad";
        $a[]="Jurisdiccion.";
         $a[]="Enfermedad metabolica.";
        $a[]="Muestra";
        
        return $a;
        
    }
    
    function myqueryfunction()
    {
        $iniQuery='';
        $ini = $this->CI->phpsession->get("tamiz_search_inicio");
        
        
        $finQuery='';
        $fin = $this->CI->phpsession->get("tamiz_search_fin");
        
        if (!empty($ini))
        $iniQuery = " AND `fechademuestra` >= '$ini' ";
        
        if (!empty($fin))
        $finQuery = " AND `fechademuestra` <= '$fin' ";
        
        
        $q = "Select 
             tamiz.id as id,   
             folio,
             fechadenacimiento,
             horanacimiento,
             sexo,
             edadgestacional,
             producto,
             numerodegemelo,
             peso,
             talla,
             fechademuestra,
             horamuestra,
             malformacion_cong,
             condicion,
             alimentacion,
             apellido_paterno,
             apellido_materno,
             tamiz.nombre,
             edadmadre,
             gesta,
             enfermedad,
             domicilio,
             colonia,
             municipio,
             estado,
             cp,
             telefono,
             tecnica,
             CONCAT_WS(' ',usuarios.paterno,usuarios.materno,usuarios.nombre) as responsable,
             estatus,
             malformacion,
             ths,
             ths_valor,
             pku,
             pku_valor,
             oh17,
             oh17_valor,
             gal,
             gal_valor,
             estado_clinica,
             unidad_clinica,
             unidad_jurisdiccion,
             enfermedad_metabolica,
             numerodegemelo,
             muestraadecuada
             
             
                
            
             FROM tamiz
             
             LEFT JOIN usuarios 
             ON 
             usuarios.id = responsable_id
             WHERE  1=1 
             $iniQuery
             $finQuery

             ";
        $r = $this->db->query($q);
        
        
        //echo "<pre>";
        //var_dump($r);
        //echo "</pre>";
        
        
        return $r;
        
    }
    
    
    function searchFormAction($dir='')
    {
        if ($dir=='lab')
        return site_url('lab/tamiz/search/');
        else
        return site_url('tamiz/search/');    
    }
    
    
     function toJsonNameList($model) {
        $m = new $model();
        $m->get();
        $a = array();
        $t = array();
        foreach($m->get()->all as $o)
        {
           
            $a [] = $o->nombre;
        }   
        
        return json_encode($a);
    }
    
    
    function editLink($label = '')
    {
        return site_url("tamiz/form/{$this->id}");
    }
    
    
    function newLink()
    {
        
        return site_url("tamiz/form/");
        
    }
    
    function getOrderByLink()
    {
        
        $assoc = $this->CI->uri->uri_to_assoc();
        
        $assoc['sort']='name';
        $assoc['dir']='asc';
        
        $url = $this->CI->uri->assoc_to_uri($assoc);
        
        
        return site_url("tamiz/all/{$url}");
    }
    function getSearchFormAction()
    {
        return site_url('tamiz/search/');
    }
    
    function save($object = '', $related_field = '') {
        
        if ($this->ths=='sospechoso')
        {
           $n = new NotificationModel();
           $n->where('tamiz_id',  $this->id);
           $n->get(1);
           if (empty($n->id)){
               
               $n->tamiz_id = $this->id;
               $n->save();
           }
          // die("sospechoso");
        }
        
        parent::save($object, $related_field);
    }
}
