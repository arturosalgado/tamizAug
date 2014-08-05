<?php

 class phpsession
    {
        
            public $user_id ;
           
            public $language='sp';
            function __construct()
            {
               // echo "loading session...";    
                // try loading in case is not
                @session_start();

            }


            function set($k,$v=NULL)
            {
                if (is_array($k))
                {
                    foreach($k as $kk =>$vv)
                    $_SESSION[$kk]=$vv;
                }

                else
                {
                    $_SESSION[$k]=$v;

                }

            }
            function get($k, $default = null)
            {
               // echo $default;
                $val =  isset($_SESSION[$k])?$_SESSION[$k]:$default;
                //echo "[asked [$k] default [$default] = returned [$val] ]<br />";
                return $val;
            }

            function see($die = false)
            {
                echo "<pre>";
                print_r($_SESSION);
                echo "</pre>";
                
                if ($die) die();

            }
            function getAll()
            {
                return $_SESSION;
            }
            function destroy()
            {
                //echo 'destroying';
                @session_destroy();
            }

            function delete($array=null)
            {
                if (empty($array)) return;

                if (is_array($array)){
                    foreach($array as $k)
                    {
                        unset($_SESSION[$k]);
                    }
                }
                else if (is_string($array))
                {
                    unset($_SESSION[$array]);
                }
            }



            /*sets an element to a specific key array*/


            function setAtKey($name,$value,$key)
            {
                $_SESSION[$key][$name]=$value;
            }


             function getAtKey($key, $index = null)
            {
                if (!is_null($index))
                {
                    return $_SESSION[$key][$index];
                }
                else 
                return $_SESSION[$key];
            }
            
            /// user related functions 
            function getUser($controller)
            {
               // echo "at get user {$controller}";
              
// seee parent_controller constructor
                // if session null redirect to login 
               // echo $controller."--" ; die();
                
                if (!isset($_SESSION['USER_ID']) and $controller!="Log" && $controller!="Forgotpassword" )
                {
                 
                    redirect ('admin/log/in');
                
                     
                }
                    else
                {
                        
                    $uid = $this->get("USER_ID",null);    
                    $u = new User($uid);
                   // echo "-- {$u->id} --";
                    return $u;
                }
                
                
            }
            
            
            // otra forma de testear para que authenticate no se cicle con los redirects;
            function getUserName()
            {
                if ( isset ($_SESSION['user']['firstname']))
                
                return $_SESSION['user']['firstname'];
                return NULL;
            }
            
            
            function __toString()
            {
                $r = "<pre>". print_R($_SESSION,true)."</pre>";
                return $r;
            }
            
            function language($set=null)
            {
                
               
                
                if (!empty($set))
                {
                    $this->language = $set;
                    $_SESSION["language"]=$this->language;
                }
                else
                {
                    return isset($_SESSION["language"])?$_SESSION["language"]:"en";
                }
            }
            function language_long($set=null)
            {
                $langs["en"]="english";
                $langs["sp"]="spanish";
                
                $lang = $this->language();
                
                return isset($lang)?$langs[$lang]:'en';
               
            }
            
            
            
    }