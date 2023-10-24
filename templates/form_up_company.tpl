
<div class="formCompany">
    <form action="modificadesarrolladora" method="post" enctype="multipart/form-data">
        <p> solo archivos .jpg </p>
        <input type="file" name="img" id="imageToUpload" >
        <h2> {$company->company|upper} </h2>
        <input type="hidden" name="name" value="{$company->company}">   
        <label for="text">Información:</label>
        <textarea id="texto" name="text" required>{$company->texto}</textarea>
        <button class="btn_form_company" type="submit" value="Agregar Compañía"> Agregar </button>
    </form>
</div>