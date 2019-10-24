<?php 
class CategorieController extends Controller {
 
    public function index(){
        $this->loadModel('Categorie');
        $lesCategories = $this->Categorie->find();
        if(empty($lesCategories)){
            $this->e404('Page Introvable');
        }
        $this->set('lesCategories',$lesCategories);
    }
    

    public function view($id=null){
        $this->loadModel('Categorie');
        $categorie = $this->Categorie->findFirst(['conditions' =>['id_joueur' => $id]]);
        if(empty($categorie)){
            $this->e404('Page Introvable');
        }
        $this->set('categorie',$categorie);
    }
}
?>