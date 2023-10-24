<?php 
require_once "libs/smarty/Smarty.class.php";
class CompanyView{
    
    public function LoadCompanies($companies){
        $smarty = new Smarty();
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);
        $cont = 0;
        $long = count($companies);
        $max = false;
        $long --;
        foreach($companies as $company){   
            if ($cont % 2 == 0){
                //cargar template 1
                $templateCompany = "../templates/company.contain1.tpl";
            }   
            else{
                //cargar template 2
                $templateCompany = "../templates/company.contain2.tpl";
            }
        
        $smarty->assign("max", $company);
        $smarty->assign('company', $company);
        if($cont != $long){
            $max = false;
            $smarty->assign('max', $max);
        }else{
            $max = true;
        }    
        $smarty->display($templateCompany);  
        $cont++;
       
        }
        
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $smarty->display($footer);
        
    }
    public function loadOne($company){
        $smarty = new Smarty();
        $header = __DIR__ . "/../templates/header.tpl";
        $smarty->display($header);
        $smarty->assign('company', $company);
        $template = __DIR__ . "/../templates/company.tpl";
        $smarty->display($template);
    }

    
}