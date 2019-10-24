<?php 
class GroupeController extends Controller {
 
    public function index(){
        $this->loadModel('Groupe');
        $lesGroupes = $this->Groupe->find(['join'=>'Competition']);
        if(empty($lesGroupes)){
            $this->e404('Page Introvable');
        }
        $this->set('lesGroupes',$lesGroupes);
    }
    

    public function view($id=null){
        $this->loadModel('Groupe');
        $groupe = $this->Groupe->findFirst(['conditions' =>['id_joueur' => $id]]);
        if(empty($groupe)){
            $this->e404('Page Introvable');
        }
        $this->set('joueur',$groupe);
    }
}
?>