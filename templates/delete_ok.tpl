<div class="msg_box" >
    <div class="msgUser">
        {if $response ne "ok"}
        <div>
            <p> No puedes borrar este recurso </p>
            <p> Si queres eliminarlo, primero elimina los juegos relacionados a él </p>
            <p> error: </p>
            <p class="p_error"> {$response} </p>
            <a class="btn_anchor" href="router.php?action=company"> volver <a/>
        </div>
        
        {else}
        <div class="msgUser">
            <p> Recurso borrado con exito! </p>
        </div>
        <a class="btn_anchor" href="router.php?action=company"> volver <a/>
        {/if}
    </div>    
</div>




