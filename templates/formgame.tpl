<div class="form_container">
    <div class="formulario">
        <div class="logo_form">
            <img src="images/lobo.png" alt="lobo" id="logo">
        </div>
        <form action="agregaJuego" method="post" enctype="multipart/form-data">

            {*<input type="file" name="input_name" id="imageToUpload">*}
            <label for="juego"> juego:</label>
            <input type="text" id="nombre" name="juego" placeholder="Nombre del Juego" required>
            <label for="imagen"> imagen:</label>
            <input type="text" id="imagen" name="imagen" placeholder="imagen" required>

            <label for="desarrollador">Selecciona una Compañia:</label>
            <select name="desarrollador" required>
                {foreach from=$companies item= $company }
                    <option value="{$company->id_desarrollador}">{$company->company}</option>
                {/foreach}
            </select>
                     

            <label for="texto">Información:</label>
            <textarea id="texto" name="texto" placeholder="Agrega información del Juego" required></textarea>
            <button class="btn_form_company" type="submit" value="Agregar Juego"> Agregar Juego</button>
        </form>
    </div>
</div>