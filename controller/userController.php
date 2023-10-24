<?php
$viewFilePath = __DIR__ . '/../view/userView.php';
$modelFilePath = __DIR__ . '/../model/userModel.php';
require_once ($modelFilePath);
require_once ($viewFilePath);
session_start();
class UserController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
        //session_start();
        
    }

    public function login(){
        if(isset($_POST['usuario']) && isset( $_POST['contraseña'])){   
            $user = $_POST['usuario'];
            $password = $_POST['contraseña'];            
            $this->verifyUser($user, $password);
        }
        else{
            $this->view->showForm("Ingresa usuario y contraseña");  // PARAMETROS OPCIONALES
        }
    }

    public function verifyUser($user, $password){
        $dbUser = $this->model->getUser($user);
        if($dbUser && password_verify($password, $dbUser->clave)){
            //session_start();
            $_SESSION['user'] = $dbUser->mail;    // Por convencion se usaria USER_MAIL
            $_SESSION['loggeado'] = true;
            header("Location:".BASE_URL);         // Si la session se inicio bien redirijo al HOME                        
        }
        else{            
            $this->view->showForm("Usuario o Contraseña Inorrecto");  // PARAMETROS OPCIONALES
        }
    }

    public function logOut(){
        if(isset($_SESSION['loggeado'])){
            //session_start();
            session_destroy();
        }
    }
       
    public function showForm(){
        $this->view->showForm();
    }
    public function confirmDel($response){     //  ???
        $this->view->confirmDel($response);
    }
    public function showCompanyForm(){      // ESTA BIEN ESTE FORMULARIO ACA???
        $this->view->showCompanyForm();
    }    
    public function showUpCompanyform($company){
        $this->view->showUpCompanyForm($company);
    }
    public function showMsg($response){

    }
    public function showHome(){
        $this->view->showHome();
    } 
}


?>