<?php 
class JoueurController extends Controller {
 
    public function index(){
        $model = ucfirst($this->request->controller);
        $this->loadModel('Joueur');
        $lesJoueur = $this->Joueur->find(['join' =>'categorie']);
        if(empty($lesJoueur)){
            $this->e404('Page Introvable');
        }
        $this->set('lesJoueur',$lesJoueur);
    }
  
    public function view($id=null){
        $this->loadModel('Joueur');
        $joueur = $this->Joueur->findFirst(['conditions' =>['id_joueur' => $id],'join'=>'Categorie']);
        if(empty($joueur)){
            $this->e404('Page Introvable');
        }
        $this->set('joueur',$joueur);
    }

    public function admin_index(){
        $this->index();
    }
    public function admin_edit(){
        echo "edit";
    }
    public function admin_delete($id){
        $this->loadModel('Joueur');
       // $this->Joueur->delete($id);
        $this->Session->setFlash('le contenu a bien été supprimé');
    }
}
?>