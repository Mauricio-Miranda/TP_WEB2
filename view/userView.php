<?php 
require_once "libs/smarty/Smarty.class.php";
class UserView{
    private $user;

    public function showHome(){
        $smarty = new Smarty;
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);   
        $template = __DIR__ . '/../templates/home.tpl';
        $smarty->display($template);
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);

    }
    public function showForm(){
        $smarty = new Smarty(); 
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);   
        $template = __DIR__ . '/../templates/loginform.tpl';
        $smarty->display($template);
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);
        
    }

    public function confirmDel($response){
        $smarty = new Smarty();
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);   
        $smarty->assign("response", $response);
        $template = __DIR__ . "/../templates/msg_company.tpl";
        $smarty->display($template);
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);

        
    }

    public function msgDB($response){
        $smarty = new Smarty();
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);   
        $smarty->assign("response", $response);
        $template = __DIR__ . "/../templates/msg_company.tpl";
        $smarty->display($template);
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);

        
    }
    public function showCompanyForm(){
        $smarty = new Smarty();
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);
        $template = __DIR__ . "/../templates/form_add_company.tpl";
        $smarty->display($template);
        $footer = __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);
    }
    public function showUpCompanyForm($company){
        $smarty = new Smarty();
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);
        $smarty->assign("company", $company);
        $template = __DIR__ . "/../templates/form_up_company.tpl";
        $smarty->display($template);
        $footer = __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);
    }    
}

?>