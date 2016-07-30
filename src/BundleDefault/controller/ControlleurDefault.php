<?php

include_once './core/FrameController.php';

use core\FrameController as FController;

class ControlleurDefault extends  FController\FrameController {
    
    public function indexAction(){
        $data = array();
        $data['content'] = $this->includ('default', 'auth');
        
        //ce bundle va etre utilise pour l'authentification une fois
        
        $this->view->rend($data,NULL,'Authentification - UB Messenger');
    }
    
    public function authAction(){
        
            if(isset($_POST['login']) && isset($_POST['pass'])){
                $bd = $this->loadModule('database');
                $u_man = $this->loadManager('user');
                
                $u_man->setDB($bd->getDB()); // on recupere l'objet de la BD
                $r = $u_man->authentificate($_POST['login'],$_POST['pass']);
                
                if($r != TRUE){
                    echo $r;
                    header('Location: http://localhost/msmessenger/');
                }else{
                    //session_start();
                    $_SESSION['nom'] = $_POST['login'];
                    //$_SESSION['pass'] = $_POST['']
                    header('location:http://localhost/msmessenger/dashboard');
                }
            }else{
                //header('Location: http://localhost/msmessenger/');
                //header('Location: http://localhost/msmessenger/');
            }
        
         //header('Location: http://localhost/msmessenger/');
        //$bd = $this->loadModule('database');
        
    }
}