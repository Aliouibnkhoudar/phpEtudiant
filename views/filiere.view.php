<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title> Etudiants </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>   
        <div class="container mt-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>filieres
                                    <a href=".././index.php" class="btn btn-danger float-end">
                                        back
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="./controller/traitement.php" method="POST">
                                    
                                <div class="mb-3">
                                    <label for="filiere">Nom Filiere</label>
                                    <input type="text" name="filiere" class="form-control">
                                </div>
                                <div class="mb-3">
                                   <button type="submit" name="save_filiere" class="btn btn-primary">save</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>