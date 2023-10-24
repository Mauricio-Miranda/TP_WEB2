<?php

class CompanyModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb2;charset=utf8', 'root', '');
    }

    public function mostrar(){
        $send = $this->db->prepare('SELECT * FROM desarrolladores');
        $send->execute();
        $model = $send->fetchAll(PDO::FETCH_OBJ);
        return $model;
    }
    
    public function showOneCompany($company){
        $send = $this->db->prepare('SELECT * FROM desarrolladores WHERE company = :company');
        $send->execute([':company' => $company]);
        $model = $send->fetch(PDO::FETCH_OBJ);
        return $model;
    }
    

    public function deleteCompany($company){
        try{
            $respuesta = "ok";
            $send = $this->db->prepare('DELETE FROM desarrolladores WHERE company = :company');
            $send->execute(array(':company'=> $company));
            return $respuesta;
        }
        catch(PDOException $e){
            $errorDB = $e->getMessage();
            return $errorDB;
        }
    }
    public function insertCompany($company, $text, $img ){
            try{
            $respuesta = "ok";
            $send = $this->db->prepare('INSERT INTO desarrolladores (company, texto, imagen) VALUES (?,?,?)');
            $send->execute([$company, $text, $img]);
            return $respuesta;
            }
            catch(PDOException $e){
                $errorDB = $e->getMessage();
                return $errorDB;
            }    
    
    }    
    function upCompany($company, $text, $img){
        try{
            $query = $this->db -> prepare('UPDATE desarrolladores SET  texto =?, imagen=?  WHERE company = ?');
            $query-> execute([$text, $img, $company]);
            $response = 'Datos actualizados correctamente';
        }
        catch(PDOException $e){
            $errorDB = $e->getMessage();
            $response = $errorDB;
        }

        return $response;
    }
}


?>