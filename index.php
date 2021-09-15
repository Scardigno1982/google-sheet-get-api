<!DOCTYPE html>

<?php
//id de la hoja de calculo de google sheet
$sheetID = "#";
//id de API Google
$key = "#";
$sheetName = "Hoja";
$range = "A1:D71";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">



</head>
<body>
<div class="card">
    <div class="card-body">
        <h1>Traer información de Google Sheet - Api Web Service</h1
    </div>
</div>
<?php
// Codigo para traer información de una planilla de Google Sheet
$url = "https://sheets.googleapis.com/v4/spreadsheets/$sheetID/values/$sheetName!$range?majorDimension=ROWS&key=$key";
$file = file_get_contents($url);
$cervezasGoogleSheet = json_decode($file);
$produtos = $cervezasGoogleSheet->{'values'};
//echo '<pre>';
//print_r($produtos);
//echo '</pre>';

?>

<div class="container-fluid">
    <?php
    for ($i = 1;
    $i < sizeof($produtos);
    $i++){
    ?>
    <div class="col-sm-3 col-md-3 text-center">
        <div class="card mb-3" style="width: 18rem;">
            <img src="<?= $produtos[$i][3] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $produtos[$i][0] ?></h5>
                <p class="card-text"><?= $produtos[$i][2] ?></p>
                <p> Precio: <?= $produtos[$i][1] ?></p>

                <button type="button" class="btn btn-primary">Comprar ahora</button>
            </div>
        </div>
            <?php
        }
        ?>
    </div>
</div>

</body>


<!--<script src="js/main.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>