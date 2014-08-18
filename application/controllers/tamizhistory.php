<?php

class tamizhistory extends MY_Controller{
    
    // search terms 
    
    private $search_name = '';
    private $search_folio = '';
    private $search_inicio = '';
    private $search_fin = '';
    
    protected $offset = 0;
    protected $limit = 20;
    protected $tamiz_id ; 
    protected  $roles= array();
    function __construct() {
        parent::__construct();
        $this->checkRol();
        
        
        $segs = $this->uri->segment_array();

        foreach ($this->uri->uri_to_assoc() as $key =>$segment)
        {
           $this->$key = $segment;
         
        }
    }
     function checkRol()
    {
       // no rol needed
    }
    
    function Content()
    {
        $h = new TamizHistoryModel();
        $data['record']=$h;
        $h->where('tamiz_id',$this->tamiz_id);
        $all = $h->get()->all;
        
        $this->data['all']=$all;
        return  $this->load->view("{$this->theme}/tamizhistory/list_view",  $this->data,true);  
        
    }
   
    
    
            function form($id = null)
    {
        $this->id = $id;
       // echo $this->id;
        $this->view = 'form';
       $this->index();
        
    }
    function update($id = null)
    {
        
        
        //print_r($_POST);
        //die();
        
        $t = new TamizModel($id);
        
        $h = new TamizHistoryModel();  
        $h->clone_me($t,$_POST); 
        
        
        $_POST['fechadenacimiento']= $this->formatdate($_POST['fechadenacimiento']);
        $_POST['fechademuestra']= $this->formatdate($_POST['fechademuestra']);
      
      
        
        foreach($_POST as $key =>$field){
           // echo "key is $key ".$field;
           // echo "<br>";
            $t->$key = $this->input->post($key);
        }
        
        if ($id ==null and !$this->folioExist($t->folio)) // id null==first time save
        $t->save();
        else if ($id!=null) {
            
          
          $h->save();//save previous 
          $t->save();// just an update
          
        }
            
        
        
        
        if ($_POST['saveType']=='save-list')
           redirect(site_url('tamiz/all/'));
            
        else if ($_POST['saveType']=='save')
           redirect(site_url("tamiz/form/{$t->id}"));
           
        else if ($_POST['saveType']=='save-new')
           redirect(site_url("tamiz/form/"));   
        
    }
    function folioExist($folio)
    {
        
        $t = new TamizModel();
        $t->where('folio',$folio)->get();
        if ($t->id)
        {
           return true;
            
        }
        else {
          return false;
        }
       
        
    }
    function formatdate($date)
    {
        list($d,$m,$y)= @split("/",$date);
        $insertDate  = date("Y-m-d",strtotime("$m/$d/$y"));
        return $insertDate;
        
    }
    
    function getControllerName() {
        return 'tamiz';
    }
   
    function search()
    {
        $this->search_name = $this->input->post("nombre");
        $this->search_folio = $this->input->post("folio");
        $this->search_inicio = $this->input->post("inicio");
        $this->search_fin = $this->input->post("fin");
        
        $this->phpsession->set("tamiz_search_name",$this->search_name);
        $this->phpsession->set("tamiz_search_folio",$this->search_folio);
        $this->phpsession->set("tamiz_search_inicio",$this->search_inicio);
        $this->phpsession->set("tamiz_search_fin",$this->search_fin);
        
        //*prevent re-submit form notice */
        redirect(site_url('tamiz/all'));
        //$this->index();
    }
    
    function insert()
    {
        
       for($i = 51 ; $i<=5000;$i++)
       {
           $u = new TamizModel();
           $u->apellido_paterno = "$i";
           $u->apellido_materno = "$i";
           $u->save();
       }
        
    }
    
    function all()
    {
       
        $this->index();
        
    }
    function duplicate()
    {
        
    }
    
    
    /*used to redirect here from*/
    function folio($folio=null)
    {
        $t = new TamizModel();
        $t->where('folio',$folio)->get(1);
        redirect(site_url("tamiz/form/{$t->id}"));
    }
    
    function checkFolio($folio=null,$id = null)
    {
     
      if ($this->folioExist($folio) and empty($id))
        echo 1;
      else
        echo 0;
    }
    
    
    function show($id='')
    {
        $this->tamiz_id = $id;
        $this->index();
    }
}