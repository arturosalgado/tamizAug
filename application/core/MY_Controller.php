<?php



abstract class MY_Controller extends CI_Controller
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
        
        $this->checkRol();
        
        
    }
    
    
    function checkRol(){
       
    }
    
            
    function load_page()
    {
        $role = $this->phpsession->get("role");
        
        $this->data['navigation']= $this->Navigation();
        $this->data['main_content']= $this->Content($role);
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
//         echo "<pre>";
//       print_r($_SESSION);
//       echo "</pre>";
        $user = $this->phpsession->get('user');
        
        
        if (!$user )
        {
            
             redirect("log/in");

            
        }
       
        
    }
    
    function Navigation()
    {
        $data['theme']=  $this->theme;
        $data['menu']=  $this->Menu();
        $data['name']= $this->phpsession->get("name");
        $data['role']= $this->phpsession->get("role");
        
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
    //*determine what limk is active, just add the class 'active'
    //based on the user we are currently at  */
    function is_active($url)
    {
       
        
        $string = $this->uri->uri_string();
        
       // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[url is {$url}][uri-string us {$string}]</div><br>";
        
        if (strpos($string."/", $url) !== FALSE)
        {
            return true;
        }
        
        return false;
    }
    
    function Menu()
    {
        /*note end all with '/' as in tamiz/all/  */
        
        
        $index = 0;
        $menu[$index]['label']="Tamiz";
        $menu[$index]['roles']=array("Administrador","Capturista","Laboratorio");
            $menu[$index]['items'][0]['label']='Listado';
            $menu[$index]['items'][0]['url']=  'tamiz/all/';
            $menu[$index]['items'][0]['active']= $this->is_active($menu[$index]['items'][0]['url']);

            
            $menu[$index]['items'][1]['role']=array("Administrador","Capturista");
            $menu[$index]['items'][1]['label']='Nuevo';
            $menu[$index]['items'][1]['url']='tamiz/form/';
            $menu[$index]['items'][1]['active']=$this->is_active($menu[$index]['items'][1]['url']);
            
            $menu[$index]['items'][2]['role']=array("Administrador","Capturista");
            $menu[$index]['items'][2]['label']='Importar';
            $menu[$index]['items'][2]['url']='tamiz/import/';
            $menu[$index]['items'][2]['active']=$this->is_active($menu[$index]['items'][2]['url']);
            
            
        $index++;
        $menu[$index]['roles']=array("Administrador");   
            $menu[$index]['label']="Usuarios";
            $menu[$index]['items'][0]['label']='listado';
            $menu[$index]['items'][0]['url']=  'users/all/';
            $menu[$index]['items'][0]['active']= $this->is_active($menu[$index]['items'][0]['url']);

            $menu[$index]['items'][1]['label']='nuevo';
            $menu[$index]['items'][1]['url']='users/form/';
            $menu[$index]['items'][1]['active']=$this->is_active($menu[$index]['items'][1]['url']);
            
        
            $index++;
          $menu[$index]['roles']=array("Administrador");      
            $menu[$index]['label']="Catalogos";
            $menu[$index]['items'][0]['label']='Unidades';
            $menu[$index]['items'][0]['url']=  '#';
            $menu[$index]['items'][0]['active']= $this->is_active($menu[$index]['items'][0]['url']);

            
            $menu[$index]['items'][0]['children'][0]['label']="Listado";
            $menu[$index]['items'][0]['children'][0]['label']="Listado";
            $menu[$index]['items'][0]['children'][0]['url']='units/all';
            $menu[$index]['items'][0]['children'][0]['active']=$this->is_active( $menu[$index]['items'][0]['children'][0]['url']);
            
            $menu[$index]['items'][0]['children'][1]['label']="Nuevo";
            $menu[$index]['items'][0]['children'][1]['url']='units/form';
            $menu[$index]['items'][0]['children'][1]['active']=$this->is_active( $menu[$index]['items'][0]['children'][0]['url']);
            ////
            
            $menu[$index]['items'][1]['label']='Jurisdicciones';
            $menu[$index]['items'][1]['url']=  '#';
            $menu[$index]['items'][1]['active']= $this->is_active($menu[$index]['items'][0]['url']);

            
            $menu[$index]['items'][1]['children'][0]['label']="Listado";
            $menu[$index]['items'][1]['children'][0]['url']='jurisdictions/all';
            $menu[$index]['items'][1]['children'][0]['active']=$this->is_active( $menu[$index]['items'][0]['children'][0]['url']);
            
            $menu[$index]['items'][1]['children'][1]['label']="Nuevo";
            $menu[$index]['items'][1]['children'][1]['url']='jurisdictions/form';
            $menu[$index]['items'][1]['children'][1]['active']=$this->is_active( $menu[$index]['items'][0]['children'][0]['url']);
            
            
            ///
            $menu[$index]['items'][2]['label']='Estados';
            $menu[$index]['items'][2]['url']=  '#';
            $menu[$index]['items'][2]['active']= $this->is_active($menu[$index]['items'][0]['url']);

            
            $menu[$index]['items'][2]['children'][0]['label']="Listado";
            $menu[$index]['items'][2]['children'][0]['url']='estados/all';
            $menu[$index]['items'][2]['children'][0]['active']=$this->is_active( $menu[$index]['items'][0]['children'][0]['url']);
            
            $menu[$index]['items'][2]['children'][1]['label']="Nuevo";
            $menu[$index]['items'][2]['children'][1]['url']='estados/form';
            $menu[$index]['items'][2]['children'][1]['active']=$this->is_active( $menu[$index]['items'][0]['children'][0]['url']);
            
            $subindex= 3;
            $menu[$index]['items'][$subindex]['label']='Laboratorios';
            $menu[$index]['items'][$subindex]['url']=  '#';
            $menu[$index]['items'][$subindex]['active']= $this->is_active($menu[$index]['items'][$subindex]['url']);

            
            $menu[$index]['items'][$subindex]['children'][0]['label']="Listado";
            $menu[$index]['items'][$subindex]['children'][0]['url']='laboratories/all/';
            $menu[$index]['items'][$subindex]['children'][0]['active']=$this->is_active($menu[$index]['items'][$subindex]['children'][0]['url']);
            
            $menu[$index]['items'][$subindex]['children'][1]['label']="Nuevo";
            $menu[$index]['items'][$subindex]['children'][1]['url']='laboratories/form/';
            $menu[$index]['items'][$subindex]['children'][1]['active']=$this->is_active($menu[$index]['items'][$subindex]['children'][1]['url']);
            
            
           
        
        ///
        
        
        $user_role=  $this->phpsession->get('role');
        //echo "<h1>$user_role</h1>";
        $ul = new Ul();
        foreach($menu as $item)
        {
           if (!in_array($user_role,$item['roles']))
           {
               continue;
           }
            
            
           $ul->add($this->MenuItem($item['label'],$item['items'],$user_role));
        }
        
        return $ul;
    }
    
    function MenuItem($label,$items,$role='')
    {   
       //echo "role is [$role]";
       
       
        $lis ='';
        foreach ($items as $k =>$item)
        {
           //print_R($item['role']);
            
            if (isset($item['role']) and !in_array($role, $item['role']))
            continue;        
            
            
            $active = '';
           if ($item['active']==1)
           {
               $active ='class = "active" ';
           }
           
           if (isset($item['children']))
           {
               $lis.= $this->subchildren($item['label'],$item['children']);
           }
           else{
            $lis.='
                <li '.$active.' >
                  <a href="'.site_url($item['url']).'">'.$item['label'].'</a>
                </li>';
           }
                                       
        }
        
         $label = '<li >
                            <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">'.$label.'</span></a>
                                <ul>
                                       '.$lis.' 
                                </ul>
                        </li>';
        return $label;
    }
    
    /*@TODO to be change for a recursive function*/
    function subchildren($label , $children)
    {
       $li =' <li>
								<a href="#">'.$label.'</a>
								<ul>';
									
       foreach($children as $child){
           $active = '';
           if ($child['active'])
           {
                $active = 'class = "active" ';
           }
            $li.='<li '.$active.'>
                    <a href="'.site_url($child['url']).'"><i class="fa fa-table"></i> '.$child['label'].'</a>
		  </li>';
       }
       
       $li.='</ul>
        </li>';
       return $li; 
    }
    
    
    function all()
    {
       
        $this->index();
        
    }
    
    function form($id = null)
    {
       
        $this->id = $id;
       // echo $this->id;
        $this->view = 'form';
       $this->index();
        
    }
    
}

