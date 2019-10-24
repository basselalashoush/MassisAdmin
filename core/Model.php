<?php 

class Model {
    static $connections = [];
    public $conf = 'massis';
    public $table = false;
    public $db;
    public $primaryKey = 'id';

    public function __construct(){
    // J'initialise qques variable
    if($this->table === false){
      $this->table = strtolower(get_class($this)); 
    }
    // Jme connecte à la base
    $conf = Conf::$database[$this->conf];
    if(isset(Model::$connections[$this->conf])){
      $this->db = Model::$connections[$this->conf];
      return true; 
    }
    try{
      $pdo = new PDO(
        'mysql:host='.$conf['host'].';dbname='.$conf['dbname'].';',
        $conf['user'],
        $conf['password'],
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
      );
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
      Model::$connections[$this->conf] = $pdo; 
      $this->db = $pdo; 
    }catch(PDOException $e){
      if(Conf::$debug >= 1){
        die($e->getMessage()); 
      }else{
        die('Impossible de se connecter à la base de donnée'); 
      }
    }
  }

  public function find($req=null){
    $sql = 'SELECT ';
    if(isset($req['fields'])){
      if(is_array($req['fields'])){
        $sql .= implode(', ',$req['fields']);
      }else{
        $sql .= $req['fields'];
      }
    }else{
      $sql .='*';
    }
    $sql .= ' FROM '.$this->table.' as '.get_class($this).' ';
    // si il y a de jointure 
    if(isset($req['join'])){ 
          if(!is_array($req['join'])){
            $sql .= ' LEFT JOIN ';
            $join = strtolower($req['join']);
            $sql .= $join. ' ON ( '.$this->table.'.id_'.$join.' = '.$join.'.id_'.$join.')';
          }else{
                  foreach($req['join'] as $v){
                $sql .= 'LEFT JOIN '.$v.' ON ( '.strtolower($this->table).'.id_'.strtolower($v).' = '.$v.'.id_'.$v.') ';
                }
          }
    }
    // Construction de la condition
    if(isset($req['conditions'])){
      $sql .= ' WHERE ';
      if(!is_array($req['conditions'])){
        $sql .= $req['conditions']; 
      }else{
        $cond = []; 
        foreach($req['conditions'] as $k=>$v){
          if(!is_numeric($v)){
            $v = '"'.addslashes($v).'"'; 
          }
          $cond[] = "$k=$v";
        }
        $sql .= implode(' AND ',$cond);
      }
    }
    $pre = $this->db->prepare($sql); 
    $pre->execute(); 
    return $pre->fetchAll(PDO::FETCH_OBJ); 
    }
    
    public function findFirst($req){
    return current($this->find($req)); 
  }
    public function delete($id){
    $key = $this->primaryKey.'_'.strtolower($this->table);
    $sql = "DELETE FROM {$this->table} WHERE $key = $id";
    $this->db->query($sql);
    }
}