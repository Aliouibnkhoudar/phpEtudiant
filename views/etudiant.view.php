<?php
    require '..//controller/dbconnect.php';
?>
<?php include'..//model/entete.model.php'; ?>
                            <div class="card-header">
                                <h4>ajout Etudiant <a href=".././index.php" class="btn btn-danger float-end">back</a> </h4>
                            </div>
                            <div class="card-body">
                                <form action="..//controller/traitement.php" method="POST">
                                    
                                <div class="mb-3">
                                    <label for="nom">Nom Etudiant</label>
                                    <input type="text" name="nom" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom">prenom Etudiant</label>
                                    <input type="texte" name="prenom" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="annee">anne de naissance Etudiant</label>
                                    <input type="number" name="annee" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="info">note informatique</label>
                                    <input type="texte" name="noteinfo" class="form-control">
                                </div><div class="mb-3">
                                    <label for="gesprojet">note gestion projet</label>
                                    <input type="texte" name="notegesprojet" class="form-control">
                                </div>
                               <!-- <div class="mb-3">
                                    <label for="filiere">filiere</label>
                                    <select class="form-select" name="filiere">
                                        <option value="1">select filiere</option>
                                       /* 
                                     </select>
                                </div>  -->
                                <div class="mb-3">
                                   <button type="submit" name="save_etudiant" class="btn btn-primary">save</button>
                                </div>

                                </form>
                            </div>
                             <?php include'..//model/basdepage.model.php'; ?>