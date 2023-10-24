<?php 
$viewFilePath = __DIR__ . '/../view/gamesView.php';
$modelFilePath = __DIR__ . '/../model/gamesModel.php';
require_once ($modelFilePath);
require_once ($viewFilePath);

class gamesController{

    private $model;
    private $view;
    private $companyModel;

    function __construct(){
        $this->model = new gamesModel();
        $this->view = new gamesView();
        $this->companyModel = new companyModel();
        
    }

    function showAll(){
        // obtengo los juegos del Modelo
        $games = $this->model->getAllGames();

        // actualizo la vista
        $this->view->showGames($games);


    }

    function delGame($id){
        //BARRERA PARA QUE SOLO PUEDA ACCEDER SI ESTAS LOGUEADO
        $this->chekLogeedIn();
        $this->model->delGame($id);  // no se para que guardo la variable $delete 

        // redirecciono al home  -- Aunque tendria que redireccionar al nuevo listado de juegos!!!!
        header("Location:".BASE_URL . 'games');
        //$this->showAll();
        
    }

    function updateGame($id){
        //BARRERA PARA QUE SOLO PUEDA ACCEDER SI ESTAS LOGUEADO
        $this->chekLogeedIn();

       // $game = $this->model->getGame($id);  // Obtener los datos del juego a modificar desde la base de datos
       // $this->view->showFormEditGame($game);

        
        if(isset($_POST['juego']) && isset( $_POST['texto']) && isset($_POST['imagen']) && isset($_POST['desarrollador'])){   
            $juego = $_POST['juego'];
            $texto = $_POST['texto'];  
            $imagen = $_POST['imagen'];
            $desarrollador = $_POST['desarrollador'];          
            $this->model->upGame($id,$juego, $texto, $imagen, $desarrollador);

    
           //redirijo al listado de todos los juegos
            header("Location:". BASE_URL . 'games');
        }
        else{
            $this->showFormEditGame("Los datos son Obligatorios");  // PARAMETROS OPCIONALES }           
        }        

        
    }

    function addGame(){   
        $this->chekLogeedIn();        
        // Estos valores vienen de un formulario
        if(isset($_POST['juego']) && isset( $_POST['texto']) && isset($_POST['imagen']) && isset($_POST['desarrollador'])){   
            $juego = $_POST['juego'];
            $texto = $_POST['texto'];  
            $imagen = $_POST['imagen'];
            $desarrollador = $_POST['desarrollador'];          
            $id= $this->model->insertGame($juego, $texto, $imagen, $desarrollador);
           //redirijo al listado de todos los juegos
            header("Location:". BASE_URL . 'games');
        }
        else{
            $this->showFormAddGame("Los datos son Obligatorios");

              // PARAMETROS OPCIONALES }           
        }   
        
    }
    function showGamesByCompany($idCompany){
        $gamesByCompany = $this->model->getGamesByCompany($idCompany);
        $this->view->showGames($gamesByCompany);

    }
    function seeMoreGame($id){
        
        $game = $this->model->getGame($id);
        $this->view->showDetailsGame($game);
        

    }

    function chekLogeedIn(){
        //session_start();
        if(!($_SESSION['loggeado'] === true)){
           header("Location:".BASE_URL );
            die();
        }
    }

    function showFormAddGame($msg = null){
        $company = $this->companyModel->mostrar();
        $this->view->showFormGame($company);
    }

    function showFormEditGame($id){
        $company = $this->companyModel->mostrar();
        $game = $this->model->getGame($id); 
        $this->view->showFormEditGame($company, $game);
    }


    
}










?>