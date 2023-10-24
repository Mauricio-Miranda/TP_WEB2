<?php

class gamesModel{

    private $db;

    function __construct(){
        // 1.- Abro una coneccion 
        $this->db = $this-> conect();
        
    }


    // Abre la coneccion con la base de Datos
    function conect(){
        $db = new PDO ('mysql:host=localhost;' . 'dbname=tpeweb2; charset=utf8', 'root', '');
        return $db;
    }

    // Obtener todos los juegos de la DB
    function getAllGames(){
        
        // 2.- Enviamos una consulta y nos devuelve el resultado.-
        // SELECT * FROM juegos
       // $query = $this->db -> prepare ('SELECT * FROM juegos');  // Son dos sub pasos a) Preparar la consulta y
        $query = $this->db -> prepare ('SELECT juegos.*, desarrolladores.company AS company FROM juegos
        INNER JOIN desarrolladores ON juegos.desarrollador = desarrolladores.id_desarrollador');
        $query-> execute();                                      // b) Ejecutarla
        /*
        SELECT juegos.*, desarrolladores.company AS company FROM juegos
        INNER JOIN desarrolladores ON juegos.desarrollador = desarrolladores.id_desarrollador




        'SELECT juegos.*, desarrolladores.* FROM juegos AS juegos INNER JOIN desarrolladores AS desarrolladores ON juegos.desarrollador = desarrolladores.id_desarrollador');
        */ 

        // 3.- Obtengo la repuesta de la DB
        $games = $query -> fetchAll(PDO::FETCH_OBJ);            // Obtengo un arreglo con TODOS los juegos        

        // 4.- Cerramos la coneccion.-   En PDO  NO HAY QUE CERRAR LA CONEXION

        return $games;  // devuelvo los juegos

    }

    function delGame($id){
        $query = $this->db -> prepare('DELETE FROM juegos WHERE id = ?');
        $query-> execute([$id]);

    }

    function upGame($id, $juego, $texto, $imagen, $desarrollador){
        $query = $this->db -> prepare('UPDATE juegos SET juego =?, texto=?, imagen=?, desarrollador=? WHERE id = ?');
        $query-> execute([$juego, $texto, $imagen, $desarrollador, $id]);
        // No tendria que controlar que "$desarrollador exista???  -- el formulario puede tener un desplegable!!!!
    }

    function insertGame($nombre, $descripcion, $imagen, $desarrollador){ //  Estos datos vienen del formulario
    
        $query = $this->db -> prepare ('INSERT INTO juegos (juego, texto, imagen, desarrollador) VALUE (?, ?, ?, ?)');  
        $query-> execute([$nombre, $descripcion, $imagen, $desarrollador]);
        // No tendria que controlar que "$desarrollador exista???  -- el formulario puede tener un desplegable!!!!

    
        // Obtengo y devuelvo el ID de la tarea nueva    
        return $this->db -> lastInsertId();  // No se para que...
    
    }

    function getGame($id){
        $query = $this->db->prepare('SELECT * FROM juegos WHERE id = ?');
        $query->execute([$id]);
        $game = $query -> fetch(PDO::FETCH_OBJ);
        return $game;
    }
    function getGamesByCompany($idCompany){
       
        $query = $this->db -> prepare ('SELECT juegos.*, desarrolladores.company 
                                        FROM juegos 
                                        INNER JOIN desarrolladores ON juegos.desarrollador = desarrolladores.id_desarrollador
                                        WHERE juegos.desarrollador = ?');
        
        $query->execute([$idCompany]);
        $gamesByCompany = $query -> fetchAll(PDO::FETCH_OBJ);
        return $gamesByCompany;

    }

    
    

}