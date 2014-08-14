<?php


class RoleModel extends ParentModel
{
    
    public  $table = 'roles';
    public  $has_many = array('estadomodel');
    protected  $ViewPath = 'roles';
            
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
             CONCAT_WS(' ',users.paterno,users.materno,users.nombre) as responsable,
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
             
             LEFT JOIN users 
             ON 
             users.id = responsable_id

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
        return site_url("{$this->viewPath()}/form/{$this->id}");
    }
    
    
    function newLink()
    {
        
        return site_url("/users/form/");
        
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
    
    
    function getFormUpdateAction()
    {
        
        return site_url("{$this->ViewPath}/update/{$this->id}");
    }
}
