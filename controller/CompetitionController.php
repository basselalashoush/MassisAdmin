<?php 
class CompetitionController extends Controller {
 
    public function index(){
        $model = ucfirst($this->request->controller);
        $this->loadModel('Competition');
        $lesCompetitions = $this->Competition->find();
        if(empty($lesCompetitions)){
            $this->e404('Page Introvable');
        }
        $this->set('lesCompetitions',$lesCompetitions);
    }
    

    public function view($mois=null,$annee=null){
       isset($mois)? $mois : date('F');
       isset($annee)? $annee : date('Y');
    }
}
?>