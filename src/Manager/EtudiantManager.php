<?php

require_once './core/FrameView.php';
require_once './src/Entity/EtudiantEntity.php';
require_once './src/Manager/Manager.php';


use core\FrameView as FView;


/**
 * Description of EtudiantManager
 *
 * @author SIMO
 */
class EtudiantManager extends Manager {
    private $bd;
    private $etudiant_entity;
    
    public function __construct() {
        parent::__construct();
        $this->etudiant_entity = new EtudiantEntity();
    }
    
    public function getListEtudiant(){
        try{
            $this->bd = $this->getDB();
            
            $query = $this->bd->query('select * from etudiant');
            return $query->fetchAll();
            
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
    
    public function addEtudiant(EtudiantEntity $etud){
        $this->etudiant_entity = $etud;
        try{
            $this->bd = $this->getDB();
            
            $query = $this->bd->prepare('insert into etudiant (nom_e,num_e,class) values (:n_e,:tel , :cl)');
            $res = $query->execute([
                'n_e'=>$etud->getNom(),
                'tel'=>$etud->getTelephoneNumber(),
                'cl'=>$etud->getClass()
                ]);
            if($res == TRUE){
                echo 'Ajout de l\'etudiant reussit';
            }  else {
                echo 'Echec lors de l\'ajout de l\'etudiant';
            }
            //return $query->fetchAll();
            
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
}
