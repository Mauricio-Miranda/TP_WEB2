<?php 

class UserModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb2;charset=utf8', 'root', '');
    }

    public function getUser($user){
        $send = $this->db->prepare("SELECT * FROM usuarios WHERE mail = ? ");
        $send->execute([$user]);
        return $send->fetch(PDO::FETCH_OBJ);
    }/*public function __construct(){
        $this->model = new PDO();

    }
    
    public function searchUser($user){
        $exist = false;
        /* Se busca el usuario en la base de datos y depende de si existe o no
        se retornará: return $exist.
        if (existe en la base de datos){
            $exist = true;
        else{
            $exist = false;
        }    
        }
        
        return $exist;
    }
    */
}



?>