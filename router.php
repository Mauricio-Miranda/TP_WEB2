<?php 

require_once 'controller/companyController.php';
require_once 'controller/gamesController.php';
require_once 'controller/userController.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



if(!empty($_GET['action'])){    
    $action = $_GET['action'];
} else {
    $action = 'home';
}


$params = explode('/', $action);

switch($params[0]){
    case 'home':
        $userController = new UserController();
        $userController->showHome();

        break;
    case 'company':
        $companyController = new CompanyController();   
        $companyController->showCompanies($companyController->searchDB());
              
        break;
    case 'games':
        // Mauricio
        $controller = new gamesController();
        $controller->showAll();
        break;
    case 'infoGame':
        $controller = new gamesController();
        $controller->seeMoreGame($params[1]);
        break;        
    case 'gamesByCompany':          
        $controller = new gamesController();
        $controller->showGamesByCompany($params[1]);       
        break;    
    case 'borrarJuego':
        // Borra un juego de la db - solo administrador logeado
        $controller = new gamesController();
        $controller->delGame($params[1]);
        break;
        
    case 'modificarJuego':
        // Modifica un juego en la db - solo administrador logeado
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $controller = new gamesController();
            $controller->updateGame($params[1]);
        }
        else{
            $controller = new gamesController();
            $controller->showFormEditGame($params[1]);
        }
        break;
    case 'agregaJuego':
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $controller = new gamesController();
            $controller->addGame();
        }
        else{
            $controller = new gamesController();
            $controller->showFormAddGame();
        }
        break;
        


    case 'filtrarJuegos':
        
        break;    
    case 'verMas':
        $company = $_GET["company"];
        $companyController = new CompanyController();
        $companyController->showMore($companyController->loadOneCompany($company));
        

        break;    
    case 'agregardesarrolladora':
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['company']) && $_POST['text'] && isset($_FILES['img'])){
                $company = $_POST['company'];
                $text = $_POST['text'];
                $img = $_FILES['img'];
                $companyController = new CompanyController();
                $response = $companyController->insertCompany($company, $text, $img );
                $userController = new UserController();
                $userController->confirmDel($response);
                
            }    
        
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
            $userController = new UserController();
            $userController->showCompanyForm();
        }   
        else{
            echo 'Error 404, página no encontrada';
        } 
        break;

    case 'borrarDesarrolladora':
        $name = $_GET['company'];
        $companyController = new CompanyController();
        $response = $companyController->modelDelete($name);
        $userController = new UserController();
        $userController->confirmDel($response);
       
        // Borra una desarrolladora de la db - solo administrador logeado
        break;

    case 'modificadesarrolladora':
        // Modifica una desarrolladora de la db - solo administrador logeado
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_FILES['img'])){
                $company = $_POST['name'];
                $text = $_POST['text'];
                $img = $_FILES['img'];    
                $companyController = new CompanyController();
                $response = $companyController->upCompany($company, $text, $img);
                $userController = new UserController();
                $userController->confirmDel($response);
            }    
            else{
                $response = 'No has hecho modificaciones';
                $userController = new UserController();
                $userController->confirmDel($response);
            }
        }
        else{
        $company = $_GET['company'];
        $companyController = new CompanyController();
        $companyObj = $companyController->loadOneCompany($company);
        $userController = new UserController();
        $userController->showUpCompanyform($companyObj);

        }    

        

        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // if(isset($_POST['usuario']) && $_POST['contraseña']){            // ESTE CONTROL LO PASO AL CONTROLLADOR DE USUARIO
            // $user = $_POST['usuario'];
            // $password = $_POST['contraseña'];
              $userController = new UserController();
            // $userController->verifyUser($user, $password);                     
               $userController->login();                     
         }
         else {
             $userController = new UserController();
             $userController->showForm();      
         }   
         
         break;
 

    case 'logout':
        $userController = new UserController();
        $userController->logOut();
        header('Location: ' . 'home');
        break;
           
    default:
        echo " ERROR 404 - Pagina no encontrada"; // este error tiene que salir de la vista
        break;

}
    
?>


