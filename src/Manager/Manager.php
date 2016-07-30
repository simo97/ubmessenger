<?php
require_once './core/FrameView.php';


use core\FrameView as FView;
/**
 * Description of Manager
 *
 * @author SIMO
 */
class Manager {
    private $pdo_db;
    
    public function __construct() {
        try{
            $this->pdo_db = new PDO('mysql:host=localhost;dbname=ub_messenger','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
            
        }  catch (PDOException $ex){
            $view = new FView\FrameView();
            $view->generateErrorPDOExceptio($ex);
        }
    }
    
    public function getDB(){
        //var_dump($this->pdo_db);
        return $this->pdo_db;
        
    }
}
