<?php 
$viewFilePath = __DIR__ . '/../view/companyView.php';
$modelFilePath = __DIR__ . '/../model/companyModel.php';
require_once ($viewFilePath);
require_once ($modelFilePath);
class CompanyController{

    private $view;
    private $model;

    public function __construct(){
        $this->view = new CompanyView();
        $this->model = new CompanyModel();

    } 
    public function searchDB(){
       return $this->model->mostrar();
    }
    public function showCompanies($companies){
        $this->view->LoadCompanies($companies);
    }
    public function loadOneCompany($company){
        
        return $this->model->showOneCompany($company);
    }
    public function showMore($companyName){
        $company = $this->loadOneCompany($companyName->company);
        $this->view->loadOne($company);
    }
    public function modelDelete($name){
        $this->chekLogeedIn();
        $dbAction = $this->model->deleteCompany($name);
        return $dbAction;
    }

    public function insertCompany($company, $text, $img){
        $this->chekLogeedIn();
        $img_ruta = __DIR__ . '/../images/company/'; 
        $img_name = $img['name'];
        $ruta_completa = $img_ruta . $img_name;

        if (move_uploaded_file($img['tmp_name'], $ruta_completa)){
            $img_db = 'images/company/' . $img_name;
            $response = $this->model->insertCompany($company, $text, $img_db);
            return $response;
       }
    
    
    
    } 
    public function upCompany($company, $text, $img){
        $this->chekLogeedIn();
        $img_ruta = 'images/company/'; 
        $img_name = $company . '.jpg';
        $ruta_completa = $img_ruta . $img_name; 
        
        if (move_uploaded_file($img['tmp_name'], $ruta_completa)) {
            if (file_exists($ruta_completa)) {
                $img_db = 'images/company/' . $company . '.jpg';
                $response = $this->model->upCompany($company, $text, $img_db,);
            }    
            
        }    
        else {
            $img_db = 'images/company/' . $company . '.jpg';
            $response = $this->model->upCompany($company, $text, $img_db,); 
             
        } 
        return $response;
    }  
    
    function chekLogeedIn(){
        if(!($_SESSION['loggeado'] === true)){
           header("Location:".BASE_URL );
            die();
        }
    }
    
    
    }

    
    




?>