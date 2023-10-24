<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="deleteCompany">
        <div class="delete_company_box">
            <div>
                <p> ¿Estás seguro de borrar éste recurso? </p>
            </div>
            <div class="delete_a">
                <a class="anchor_delete" href="router.php?action=borrarDesarrolladora&company={$company->company}&borrar=no"> Sí </a> 
                <a class="anchor_delete" href="company"> No </a>
            </div>
        </div>
    </div> 
</body>
</html>
