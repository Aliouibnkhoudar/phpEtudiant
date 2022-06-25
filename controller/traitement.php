<?php
   session_start();
   require "dbconnect.php";

    if (isset($_POST['save_filiere'])) {
        $filiere = mysqli_real_escape_string($con, $_POST['filiere']);

        $query = "INSERT into filiere (libellefiliere) values 
            ('$filiere')";
        
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['message'] = "un etudiant a ete cree avec succes";
            header("Location : ./views/filiere.view.php");
            exit(0);
        }else{
            $_SESSION['message'] = "echec lors de la creation";
            header("Location : ./views/filiere.view.php");
            exit(0);
        }
    }

    if (isset($_POST['save_etudiant'])) {

        $nom = mysqli_real_escape_string($con, $_POST['nom']);
        $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
        $annee = mysqli_real_escape_string($con, $_POST['annee']);
        $noteinfo = mysqli_real_escape_string($con, $_POST['noteinfo']);
        $notegesprojet = mysqli_real_escape_string($con, $_POST['notegesprojet']);
        $cumulNote = $noteinfo + $notegesprojet;
        $moyenne = $cumulNote/2;

        $query = "INSERT into etudiantu (nom,prenom,anneenaissance,noteinfo,notegestionprojet,moyenne) 
                    values ('$nom','$prenom',$annee,'$noteinfo','$notegesprojet','$moyenne')";
        
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['message'] = "un etudiant a ete cree avec succes";
            echo $_SESSION['message'];
            header("Location : index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "echec lors de la creation";
            header("Location : ./views/etudiant.view.php");
            exit(0);
        }
    }

   
