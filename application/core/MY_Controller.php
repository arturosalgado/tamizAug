<?php



class MY_Controller extends CI_Controller
{
    
    
    protected $data = array();
    protected $view = 'list';
    protected $id = null;
    protected $totalRecords = 0;
    protected $limit = 20;
    protected $offset = 0;
     protected $ViewPath = '';
    protected $theme = 'admin2';
    function __construct() {
        parent::__construct();
        $c = $this->getControllerName();
        
       
        if ($c!='log')
        $this->checkSession();
        
    }
    
    
    function load_page()
    {
        
        $this->data['navigation']= $this->Navigation();
        $this->data['main_content']= $this->Content();
        $this->data['theme']= base_url()."/themes/{$this->theme}/";
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
    
    function Navigation()
    {
        $data['theme']=  $this->theme;
        
        return $this->load->view("{$this->theme}/navigation",$data,true);
    }
    
    function getControllerName()
    {
    
    }
     /*combina la paginacion con el uri que puede ser dinamico*/
    function pagination()
    {
          //$segment =4; 
        
            $this->load->library('pagination');

            $assoc = $this->uri->uri_to_assoc();
          
            unset($assoc['offset']);// so it doesnt append the offset/20/60
            
            $url = $this->uri->assoc_to_uri($assoc);
            //echo "count is"; echo count($assoc)."---";
            $config['base_url'] = site_url("{$this->ViewPath}/all/{$url}/offset/");//better always at the end
            $config['total_rows'] = $this->totalRecords;
            $config['per_page'] = $this->limit; 
            //echo "{count}[["; echo count($assoc)*2+3;
            $config['uri_segment'] =  count($assoc)*2+4;
            
            
            
            $this->pagination->initialize($config); 
            
            return $this->pagination->create_links();  
        
    }
    
}