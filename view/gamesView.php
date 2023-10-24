<?php 

class gamesView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        
    }

    function showGames($games){       
        $header = __DIR__ . "/../templates/header.tpl";
        $this->smarty->display($header);
        $this->smarty->assign('games', $games);
        $this->smarty->display('templates/card.tpl');
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $this->smarty->display($footer);
    }

    function showDetailsGame($game){
        $header = __DIR__ . "/../templates/header.tpl";
        $this->smarty->display($header);
        $this->smarty->assign('game', $game);
        $template = __DIR__ .'/../templates/gamedetails.tpl';
        $this->smarty->display($template);
        $footer =  __DIR__ . "/../templates/footer.tpl";
        $this->smarty->display($footer);
    }    

    function showError($msg){   //  Falta smarty !!!!
        echo"<h1> ERROR! </h1>";
        echo"<h2>  $msg  </h2>";
    }

    function ShowFormGame($company, $error = null){
        $header = __DIR__ . "/../templates/header.tpl";
        $this->smarty->display($header);
        $this->smarty->assign('companies',$company);
        $this->smarty->display("../templates/formgame.tpl");
        
    }

    function ShowFormEditGame($company, $game, $error = null){
        $header = __DIR__ . "/../templates/header.tpl";
        $this->smarty->display($header);
        $this->smarty->assign('companies',$company);
        $this->smarty->assign('game', $game);
        $this->smarty->display("../templates/formupgame.tpl");
        
    }


}
?>