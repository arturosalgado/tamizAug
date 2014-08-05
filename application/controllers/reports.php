<?php

class reports extends MY_Controller{
    
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    function Content()
    {
        
        switch($this->field)   
        {
            
            case 'state';
            return $this->report_state();
            
        }
       
        
        
        
    }
    
    function report_state()
    {
        $t = new TamizModel();
        
        $e = new EstadoModel();
        $this->data['record']=$t;
        $this->data['estados']=$e->toOptions();
        
        $t->get();
        $all = $t->all;
        $this->data['all']=$all;
        return  $this->load->view("admin/reports/state",  $this->data,true);  
        
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
        
        $t = new TamizModel($id);
        
        
        $_POST['fechadenacimiento']= $this->formatdate($_POST['fechadenacimiento']);
        $_POST['fechademuestra']= $this->formatdate($_POST['fechademuestra']);
      
      
        
        foreach($_POST as $key =>$field){
           // echo "key is $key ".$field;
           // echo "<br>";
            $t->$key = $this->input->post($key);
        }
        $t->save();
        redirect(site_url("/tamiz/"));
        
    }
    
    function formatdate($date)
    {
        list($d,$m,$y)= @split("/",$date);
        $insertDate  = date("Y-m-d",strtotime("$m/$d/$y"));
        return $insertDate;
        
    }
    
    function getControllerName() {
        return 'reports';
    }
   
    function generate($field)
    {
        $this->field = $field;
        $this->index();
        
    }
    
    function test()
    {
            
        $this->load->library('export');
        $this->load->model('TamizModel');
        
        $sql = $this->TamizModel->myqueryfunction();
        $this->export->setHeaders($this->TamizModel->getExcelHeaders());
        $this->export->to_excel($sql, 'nameForFile'); 
        
    }
}