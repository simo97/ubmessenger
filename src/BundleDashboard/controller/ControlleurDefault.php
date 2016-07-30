<?php
include_once './core/FrameController.php';
include_once 'Services/Twilio.php';

use core\FrameController as FController;

class ControlleurDefault extends  FController\FrameController {
    public function indexAction(){
        
        $etud_manager = $this->loadManager('etudiant');
        $data['table_etud'] = $etud_manager->getListEtudiant();
        
        ob_start();
        foreach ($data['table_etud'] as $row): ?>
            <tr>
                <td>
                    <input type="checkbox" id="<?php echo $row['id_etud'] ?>" name="ids" value="<?php echo $row['id_etud'] ?>"/>
                    <label for="<?php echo $row['id_etud'] ?>" ><?php echo $row['id_etud'] ?></label>
                </td>
                <td ><?php echo $row['nom_e'] ?></td>
                <td ><?php echo $row['num_e'] ?></td>
                <td ><?php echo $row['class'] ?></td>
            </tr> <?php       
        endforeach;
            
        $table_etud = ob_get_clean();
        
        $data['etud_form'] = $this->includ('dashboard', 'etudiant');
        $data['etud_list'] = $this->includ('dashboard', 'list_etud',$table_etud);
        //on va appreter le code final a afficher ici
        
        $data['content'] = $this->includ('dashboard', 'content',$data);
        $this->view()->rend($data,NULL,'Acceuil - UBMessenger',true);
    }
    
    /**
     * Cette methode va etre appele avec AJAX pour l'ajout d'un etudiant
     */
    public function addEtudiantAction(){
        $etud_manager = $this->loadManager('etudiant');
        $etudiant = $this->loadEntity('etudiant');
        
        $etudiant->setClass( $_POST['class']);
        $etudiant->setTelephoneNumber( $_POST['tel']);
        $etudiant->setNom($_POST['nom']);
        
        $etud_manager->addEtudiant($etudiant);
    }
    
    /**
     * Cette fonction est utlisée pour l'envoi de message
     * elle recoit les donnée avec POST
     * 
     * cette fonctionrecuepre la liste et va commencer a la parcourir
     * pour envoye les MSG via l'API qui sera utilisée
     */
    public function sendByNexmoAction(){
//        foreach ($_POST['ids'] as $id):
//            echo $id.'|';
//        endforeach;
        
        //on commence par initialisé la message
        $urld = 'https://rest.nexmo.com/sms/json?'.http_build_query(
                [
                    'api_key' =>  '0b5df9c3',
                    'api_secret' => '9d26587b07bd4a78',
                    'to' => '237693539419',
                    'from' => 'adonis',
                    'text' => 'Bonjour+de+la+part+de+adonis+depuis+nexmo'
                ]
            );
        
        //$url  = "https://rest.nexmo.com/sms/json?api_key=0b5df9c3&api_secret=9d26587b07bd4a78&from=NEXMO&to=237693539419&text=Welcome+to+Nexmo";
        
        $ch = curl_init($urld);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(!$reponse = curl_exec($ch)){
            echo 'echec lors de l\'envoi';
            return;
        }
        
        $decoded_response = json_decode($reponse, true);
        
        $this->logger->log('ERROR','You sent ' . $decoded_response['message-count'] . ' messages.');
        
        var_dump($reponse);
//        foreach ( $decoded_response['messages'] as $message ) {
//            if ($message['status'] == 0) {
//                $this->logger->log('ERROR',"Success " . $message['message-id']);
//            } else {
//                $this->logger->log('ERROR',"Error {$message['status']} {$message['error-text']}");
//            }
//        }
        
        //echo $reponse;
    }
    
    public function sendByTwilioAction(){
        $accoutSid = 'AC3f4696914fdd7dd1a87c9e02ed452f3d';
        $authToken = 'f4e925f5bedc1729a9bbd48b7940b545';
        
        $client = new Services_Twilio($accoutSid,$authToken);
        
        try{
            $message = $client->account->messages->create(array(
                "From"=>"+237693539419",
                "To"=>"+237695142746",
                "Body"=>"Bonjour voici le message depuis Twilio"
            )); 
            print $message->sid;
        }  catch (Services_Twilio_HttpException $ex){
            $this->view->generateErrorException($ex);
        }  catch (Services_Twilio_RestException $ex){
            $this->view->generateErrorException($ex);
        }  catch (Services_Twilio_HttpStreamException $ex){
            $this->view->generateErrorException($ex);
        }catch (Services_Twilio_TinyHttpException $ex){
            $this->view->generateErrorException($ex);
        }catch (Services_Twilio_TwimlException $ex){
            $this->view->generateErrorException($ex);
        }
    }
}