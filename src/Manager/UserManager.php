<?php

require_once './core/FrameView.php';
require_once './src/Entity/UserEntity.php';
require_once './src/Manager/Manager.php';


use core\FrameView as FView;
/**
 * Description of UserManager
 *
 * @author SIMO
 */
class UserManager extends Manager{
    //put your code here
    private $bd;
    private $user_entity;
    
    public function __construct() {
        parent::__construct();
        $this->user_entity = new UserEntity();
    }
    
    public function authentificate($nom,$pass){
        try{
            $this->bd = $this->getDB();
            
            $query = $this->bd->prepare('select * from utilisateur where nom = :n and pass = sha1(:p)');
            
            $res = $query->execute(array(
                'n'=>$nom,
                'p'=>$pass
            ));
            if($res == TRUE){
                return true;
            }else{
                return false;
            }
            
        } catch (\Exception $ex){//exception non reconnu
            $view = new FView\FrameView();
            $view->generateErrorException($ex);
        }  catch (FException\FrameException $ex){//exception Frame
            $view = new FView\FrameView();
            $view->generateErrorFrameException($ex);
        }  catch (\PDOException $pdo_ex){//exception PDO
            $view = new FView\FrameView();
            $view->generateErrorPDOExceptio($ex);
        }    
    }
    
    public function setDB($db){
         $this->bd = $db;
    }
}
