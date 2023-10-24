<div class="container_cards">
    {foreach from=$games item=$juegos }
        <div class="card_container">
            <div class="img_card">
                <img src="{$juegos->imagen}" alt="{$juegos->juego}">
            </div>
            <div class="card_text">
                <h4>{$juegos->juego}</h4>
                <p><span>Empresa: </span> {$juegos->company}</p> 
                <div class="btnJuego">
                    <a class="btn_anchor" href="router.php?action=infoGame/{$juegos->id}">Ver mas</a>
                    <!-- if es usuario cargar template -->
                    {if isset($smarty.session.loggeado) }
                        <a class="btn_anchor" href="router.php?action=modificarJuego/{$juegos->id}"> Editar </a>
                        <a class="btn_anchor" href="borrarJuego/{$juegos->id}"> Eliminar </a>
                    {/if}

                </div>
            </div>
        </div>
    {/foreach}   
    
</div>