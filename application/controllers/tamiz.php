<?php

class tamiz extends MY_Controller{
    
    // search terms 
    
    private $search_name = '';
    private $search_folio = '';
    private $search_inicio = '';
    private $search_fin = '';
    protected $ViewPath='tamiz';
    protected $offset = 0;
    protected $limit = 20;
    protected  $roles= array("Capturista","Administrador",'Laboratorio');
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
       $user_role = $this->phpsession->get('role');
       //ECHO "$user_role";
       if (!in_array($user_role,  $this->roles))
       {
          redirect(site_url('home'));
       }
    }
    
    function searchbyfolio($folio='')
    {
        $folio = $this->input->post('folio');
        $this->phpsession->set("search_folio",$folio);
        $t = new TamizModel();
        $t->where('folio',$folio);
        $t->get(1);
        if (!empty($t->id))
         redirect (site_url('tamiz/form/'.$t->id));   
        else
        {
            
        }
        
    }
    
    function Content($role  = NULL)
    {
       $this->search_name = $this->phpsession->get("tamiz_search_name"); 
       $this->search_folio = $this->phpsession->get("tamiz_search_folio"); 
       $this->search_inicio = $this->phpsession->get("tamiz_search_inicio"); 
       $this->search_fin =    $this->phpsession->get("tamiz_search_fin"); 
       
        if ($this->view =='import')
        {
           return $this->load->view("{$this->theme}/{$this->ViewPath}/import",$this->data,true);
        }
       
       
       else if ($this->view=='form') {
       //echo " id ".$this->id;
       $t = new TamizModel($this->id);    
       $t->where('id',  $this->id)->get(1);
      
      
       $this->data['record']=$t;  
       
       switch ($role)
       {
           
           case 'Laboratorio':
           {
                return $this->load->view("{$this->theme}/laboratorio/tamiz/form",  $this->data,true);  
           }
           default :
                return $this->load->view("{$this->theme}/tamiz/form",  $this->data,true);  
       }
       
      
       }
       else
       {    
           $t = new TamizModel();
           $this->data['record']=$t;
           
           
           $t->start_cache();   
           
            // search section 
            if ($this->search_name != ''){
            
            $t->like('nombre',  $this->search_name);   
            $t->or_like('apellido_paterno', $this->search_name);
            $t->or_like('apellido_materno', $this->search_name);
            }

            if ($this->search_folio != ''){
             $t->where('folio',  $this->search_folio);   
            }
            
            $t->stop_cache();
            $q =  $t->get_raw();
       
            $r = $q->num_rows();
           
            $this->totalRecords = $r;
            
            
          //  $t->join
           //$t->get();    
           
           //echo $this->totalRecords=$t->result_count();
          
           $t->get($this->limit,$this->offset);    
           //echo $this->totalRecords=$t->result_count();
           
           $all = $t->all;
           $this->data['all']=$all;
           
           $this->data['pagination']=$this->pagination();

           //search values 
           
           $this->data['search_name']=  $this->search_name;
           $this->data['search_folio']=  $this->search_folio;
           $this->data['search_inicio']=  $this->search_inicio;
           $this->data['search_fin']=  $this->search_fin;
           
           
           switch ($role)
       {
           
           case 'Laboratorio':
           {
               return  $this->load->view("{$this->theme}/laboratorio/tamiz/list_view",  $this->data,true);  
           }
           default :
               return  $this->load->view("{$this->theme}/tamiz/list_view",  $this->data,true);  
       }
           
           
           
        
       } 
        
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

    function import()
    {
        $data["a"]="a";
        $this->view = 'import';
        $this->index();
        
        
        
    }
    
    
    function importfile()
    {
        
        print_r($_FILES);
     
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'csv|txt';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			print_r($error);
		}
		else
		{
			$data = $this->upload->data();
                      
			$this->readFileContents($data['full_path']);
                                
		}
        
    }
    
    function readFileContents($filename)
    {
        $lines = file($filename); // gets file in array using new lines character
        $reference [1]='Normal';
        $reference [0]='Normal';
        $reference [2]='Sospechoso';
        foreach($lines as $line)
        {
           $line = trim($line); 
           if (empty($line)) continue;
           $temparr = explode(',',$line);
           $this->trim_all($temparr);
           
           
           
           $t = new TamizModel();
           $folio = $temparr[0];
           $laboratorio = $temparr[1];
           $ths = $reference[$temparr[2]];
           $ths_valor = $temparr[3];
           
           $_17oh = $reference[$temparr[4]];
           $_17oh_valor = $temparr[5];
           
           $gal = $reference[$temparr[6]];
           $gal_valor = $temparr[7];
           
           $pku = $reference[$temparr[8]];
           $pku_valor = $temparr[9];
           
           
           $t->where('folio',$folio)->get(1);
           
           if (!empty($t->id))
           {    
                $t->folio= $folio;
                $t->laboratorio= $laboratorio;
                
                $t->ths = $ths;
                $t->ths_valor = $ths_valor;
                
                $t->oh17 = $_17oh;
                $t->oh17_valor = $_17oh_valor;
                
                $t->gal = $gal;
                $t->gal_valor = $gal_valor;
                $t->pku = $pku;
                $t->pku_valor = $pku_valor;
                
                
                $t->save();
           }
           else
           {
                $t->folio= $folio;
                $t->laboratorio= $laboratorio;
                
                $t->ths = $ths;
                $t->ths_valor = $ths_valor;
                
                $t->oh17 = $_17oh;
                $t->oh17_valor = $_17oh_valor;
                
                $t->gal = $gal;
                $t->gal_valor = $gal_valor;
                $t->pku = $pku;
                $t->pku_valor = $pku_valor;
                $t->save();
           }
           
           
        } 
        redirect('tamiz/all/');
    }
    function trim_all(& $array)
    {
        foreach($array as $k=> $value)
        {
            $array[$k]= trim($value);
        }
    }
    
}