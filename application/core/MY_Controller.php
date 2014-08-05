<?php



class MY_Controller extends CI_Controller
{
    
    
    protected $data = array();
    protected $view = 'list';
    protected $id = null;
           
    protected $theme = 'admin2';
    function __construct() {
        parent::__construct();
        $c = $this->getControllerName();
        
       
        if ($c!='log')
        $this->checkSession();
        
    }
    
    
    function load_page()
    {
        
        
        $this->data['main_content']= $this->Content();
        $this->data['theme']= "/themes/{$this->theme}/";
        return $this->parser->parse("{$this->theme}/layout",$this->data);
        
    }
    
    
    function index()
    {
        
        return $this->load_page();
        
    }
    
    function checkSession()
    {
       
        
        $this->load->library('phpsession');
        $user = $this->phpsession->get('user');
        
        
        if (!$user )
        {
            
             redirect("log/in");

            
        }
       
        
    }
    
    
    function getControllerName()
    {
    
    }
    
    
}