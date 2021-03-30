<?php
    //BDD CONNECTION
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } 
    catch (Exception $e) 
    {
        die('Erreur : '.$e->getMessage());
    }

    //VERIFICATION
    if(isset($_POST['pseudo_msg']) && isset($_POST['message_msg']))
    {
        $pseudo = $_POST['pseudo_msg'];
        $txt = $_POST['message_msg'];
        // INSERT PREP REQ
        $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
        $req->execute(array($_POST['pseudo_msg'], $_POST['message_msg']));
        
        //COOKIE
        setcookie('pseudo_msg', $_POST['pseudo_msg'], time() + 365*24*3600, null, null, false, true);

        header('Location: index.php?succes=true');
        exit();
    } 
    else 
    {
        //REDIRECTION
        header('Location: index.php');
        exit();
    }

?>