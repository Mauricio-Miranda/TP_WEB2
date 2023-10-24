<section class="section_container">
        <section class="company">
            <div class="textCompany">
                <p>
                    {$company->texto}
                </p>
            </div>
            <div class="imagenCompany">
                <img src="{$company->imagen}" alt="{$company->company}">
            </div>
        </section>
        <div class="bton_ver_mas_container">
            {if isset($smarty.session.loggeado)}
            <a class="btn_anchor" href="router.php?action=verMas&company={$company->company}"> Ver más </a>
            <a class="btn_anchor" href="router.php?action=modificadesarrolladora&company={$company->company}"> Editar </a>
            <a class="btn_anchor"  href="router.php?action=borrarDesarrolladora&company={$company->company}"> Borrar </a>
            <a class="btn_anchor" href="router.php?action=gamesByCompany/{$company->id_desarrollador}"> ver Juegos</a>

        </div>
        <hr>
        {if $max}
            <div class="box_btn_agregar">
                <a class="btn_agregar" href="router.php?action=agregardesarrolladora"> Agregar </a>
            </div>
        {/if}
        {else}
        <a class="btn_anchor" href="router.php?action=verMas&company={$company->company}"> Ver más </a>
        <a class="btn_anchor" href="router.php?action=gamesByCompany/{$company->id_desarrollador}"> ver Juegos</a>

        {/if}
</section>