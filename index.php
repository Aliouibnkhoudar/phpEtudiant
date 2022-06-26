<?php
   require ".//controller/dbconnect.php";

   if (isset($_POST['moyenne_info'])) {

    //$moyenne_max = 'SELECT id, nom, prenom, anneenaissance, noteinfo, notegestionprojet, MAX(moyenne) FROM etudiantu';
        $moyenneInf =  "SELECT AVG(noteinfo) as moyinfo
                            FROM etudiantu";
        $moyenneInf_run = mysqli_query($con, $moyenneInf);
       
            while ($colonne = mysqli_fetch_assoc($moyenneInf_run)){
                $result_moyinfo = $colonne['moyinfo'];
    
      //listing moyenne  info 
            
        }
      echo "listing moyenne info : " .$result_moyinfo;
    }
    if (isset($_POST['moyenne_gestionprojet'])) {

        //$moyenne_max = 'SELECT id, nom, prenom, anneenaissance, noteinfo, notegestionprojet, MAX(moyenne) FROM etudiantu';
            $moyenneInf =  "SELECT AVG(notegestionprojet) as moygesP
                                FROM etudiantu";
            $moyenneInf_run = mysqli_query($con, $moyenneInf);
           
                while ($colonne = mysqli_fetch_assoc($moyenneInf_run)){
                    $result_moygesP = $colonne['moygesP'];
        
            //listing moyenne  gestion projet
            }

            echo "listing moyenne gestion projet :". $result_moygesP;
        }

?>   

<?php include'.//model/entete.model.php'; ?>
                        <div class="card-header">
                            
                            <h4>details Etudiants
                                <a href=".//views/etudiant.view.php" class="btn btn-primary float-end">ajouter etudiant</a>
                           <!--     <a href=".//views/filiere.view.php" class="btn btn-primary float-end">ajouter filiere</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <!-- affichage des etudiants-->
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>nom etudiant </th>
                                        <th>prenom etudiant</th>
                                        <th>annee naissance etudiant</th>
                                        <th>note info</th>
                                        <th>note gesprojet</th>
                                        <th>moyenne Etudiant</th>
                                       <!-- <th>action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $query = "SELECT * FROM etudiantu";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run)>0) {
                                            foreach ($query_run as $etudiantu) {
                                                ?>
                                                <tr>
                                                    <td><?= $etudiantu['id']; ?></td>
                                                    <td><?= $etudiantu['nom']; ?></td>
                                                    <td><?= $etudiantu['prenom']; ?></td>
                                                    <td><?= $etudiantu['anneenaissance']; ?></td>
                                                    <td><?= $etudiantu['noteinfo']; ?></td>
                                                    <td><?= $etudiantu['notegestionprojet']; ?></td>
                                                    <td><?= $etudiantu['moyenne']; ?></td>
                                                   
                                                   <!-- <td>
                                                        <a href="" class="btn btn-info btn-sm">donnees etudiant</a>
                                                        <a href="" class="btn btn-success btn-sm">modifier</a>
                                                        <form action="code.php" method="POST" class= "d-inline"> 
                                                            <button type="submit" name="suppimer_etudiant" value="" class="btn btn-danger btn-sm">supprimer</button>
                                                        </form>
                                                    </td>-->
                                                </tr>
                                                <?php
                                            }
                                        }else {
                                            echo "<h5> Error: </h5>";
                                        }
                                    ?>
                                </tbody>
                            </table> 
                        </div>
                                                    <!-- listing des etudiants -->

                        <div class="card-header">
                            <form method="POST"> 
                                <input class="form-control col-md-9" type="search" placeholder="Search" name="rechercher">
                                <button class="btn btn-outline-success" type="submit" name="recherche_annee">recherche_annee</button>
                                <button class="btn btn-outline-success" type="submit" name="recherche_nom">recherche_nom</button>
                                <button class="btn btn-outline-success" type="submit" name="moyenne_max">etudiantMoyenneMax</button>
                                <button class="btn btn-outline-success" type="submit" name="classementDESC">classement</button>
                                <button class="btn btn-outline-success" type="submit" name="moyenne_info">moyenne_info</button>
                                <button class="btn btn-outline-success" type="submit" name="moyenne_gestionprojet">moyenne_gestionprojet</button>
                                
                                <div class="card-body">
                                    
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>nom etudiant </th>
                                            <th>prenom etudiant</th>
                                            <th>annee naissance etudiant</th>
                                            <th>note info</th>
                                            <th>note gesprojet</th>
                                            <th>moyenne Etudiant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    
                                        if (isset($_POST['recherche_nom'])) {

                                            $recherche_nom = mysqli_real_escape_string($con, $_POST['rechercher']);

                                            $alletudiantnom = 'SELECT * FROM etudiantu WHERE nom LIKE "%'.$recherche_nom.'%"';
                                            $alletudiantnom_run = mysqli_query($con, $alletudiantnom);

                                            if (mysqli_num_rows($alletudiantnom_run)>0) {
                                            foreach ($alletudiantnom_run as $valuenom) {

                                    ?> <!-- listing des etudiants par nom -->
                                            <tr>
                                                <td><?= $valuenom['id']; ?></td>
                                                <td><?= $valuenom['nom']; ?></td>
                                                <td><?= $valuenom['prenom']; ?></td>
                                                <td><?= $valuenom['anneenaissance']; ?></td>
                                                <td><?= $valuenom['noteinfo']; ?></td>
                                                <td><?= $valuenom['notegestionprojet']; ?></td>
                                                <td><?= $valuenom['moyenne']; ?></td>

                                            </tr>
                                        <?php
                                                }
                                            }else {
                                                echo " ERROR :  ETUDIANT NON TROUVE";
                                            }
                                        }
                                            if (isset($_POST['recherche_annee'])) {
                                                $recherche_annee = mysqli_real_escape_string($con, $_POST['rechercher']);

                                                $alletudiantannee = 'SELECT * FROM etudiantu WHERE anneenaissance LIKE "%'.$recherche_annee.'%"';
                                                $alletudiantannee_run = mysqli_query($con, $alletudiantannee);

                                                if (mysqli_num_rows($alletudiantannee_run)>0) {
                                                    foreach ($alletudiantannee_run as $valueannee) {
                                            ?>
                                                <!-- listing des etudiants par annee de naissance-->
                                                        <tr>
                                                            <td><?= $valueannee['id']; ?></td>
                                                            <td><?= $valueannee['nom']; ?></td>
                                                            <td><?= $valueannee['prenom']; ?></td>
                                                            <td><?= $valueannee['anneenaissance']; ?></td>
                                                            <td><?= $valueannee['noteinfo']; ?></td>
                                                            <td><?= $valueannee['notegestionprojet']; ?></td>
                                                            <td><?= $valueannee['moyenne']; ?></td>
                                                        </tr>
                                            <?php
    
                                                    }
                                                    }else {
                                                        echo " ERROR : ETUDIANT NON TROUVE";
                                                    }
                                                }
                                                if (isset($_POST['moyenne_max'])) {

                                            //$moyenne_max = 'SELECT id, nom, prenom, anneenaissance, noteinfo, notegestionprojet, MAX(moyenne) FROM etudiantu';
                                                $moyenne_max =  "SELECT  id,nom,prenom,anneenaissance, noteinfo,notegestionprojet,moyenne 
                                                                    FROM etudiantu 
                                                                    WHERE moyenne = (SELECT MAX(moyenne)
                                                                                        FROM etudiantu)";
                                                $moyenne_max_run = mysqli_query($con, $moyenne_max);
                                                if (mysqli_num_rows($moyenne_max_run)>0) {
                                                    foreach ($moyenne_max_run as $valuemax) {
                                                        
                                            ?>
                                                <!-- listing de(s) etudiant(s) ayant a moyenne max-->
                                                        <tr>
                                                            <td><?= $valuemax['id']; ?></td>
                                                            <td><?= $valuemax['nom']; ?></td>
                                                            <td><?= $valuemax['prenom']; ?></td>
                                                            <td><?= $valuemax['anneenaissance']; ?></td>
                                                            <td><?= $valuemax['noteinfo']; ?></td>
                                                            <td><?= $valuemax['notegestionprojet']; ?></td>
                                                            <td><?= $valuemax['moyenne']; ?></td>
                                                        </tr>
                                            <?php
                                                    }
                                                }else {
                                                    echo " ERROR : ETUDIANT NON TROUVE";
                                                }
                                            }
                                            if (isset($_POST['classementDESC'])) {

                                                //$moyenne_max = 'SELECT id, nom, prenom, anneenaissance, noteinfo, notegestionprojet, MAX(moyenne) FROM etudiantu';
                                                    $classement =  "SELECT *
                                                                        FROM etudiantu 
                                                                        ORDER BY moyenne DESC";
                                                    $classement_run = mysqli_query($con, $classement);
                                                    if (mysqli_num_rows($classement_run)>0) {
                                                        foreach ($classement_run as $classementU) {
                                                            
                                                ?>
                                                    <!-- listing des etudiants par mayenne decroissant-->
                                                            <tr>
                                                                <td><?= $classementU['id']; ?></td>
                                                                <td><?= $classementU['nom']; ?></td>
                                                                <td><?= $classementU['prenom']; ?></td>
                                                                <td><?= $classementU['anneenaissance']; ?></td>
                                                                <td><?= $classementU['noteinfo']; ?></td>
                                                                <td><?= $classementU['notegestionprojet']; ?></td>
                                                                <td><?= $classementU['moyenne']; ?></td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }else {
                                                        echo " ERROR : ETUDIANT NON TROUVE";
                                                    }
                                                }
                                              
                                        ?>
                                    </tbody>
                                </table> 

                            </form>
                        </div>
                   
        <?php include'.//model/basdepage.model.php'; ?>