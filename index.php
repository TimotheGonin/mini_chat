<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Chat</title>
    <link rel="stylesheet" type="text/css" href="design/default.css">
</head>
<body>

    <header>
        <h1 class="txt-center marg0">Mini-Chat</h1>
    </header>

    <main>
        <!-- MESSAGES ON DISPLAY -->
        <section id="msg">
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

                // Récupération des 10 derniers messages
                $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
                
                while ($donnees =$reponse->fetch())
                {?>
                    <p class="msg_pseudo"><?=htmlspecialchars($donnees['pseudo'])?> :</p>
                    <p class="msg_content"><?=htmlspecialchars($donnees['message'])?></p>
                <?php
                }

                //Fermeture requette
                $reponse->closeCursor();
            ?>
        </section>

        <!-- SEND MESSAGE FORM-->
        <section id="msg_form">
            <table class="box-center">
                <form action="post.php" method="post">
                    <thead>
                        <tr>
                            <th>
                                <h2 class="txt-center">Poster un message</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label for="pseudo_msg">Votre pseudo :</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="pseudo_msg" value="<?php
                                if(isset($_COOKIE['pseudo_msg'])){
                                    $cookiePseudo = $_COOKIE['pseudo_msg'];
                                    echo $cookiePseudo;
                                };
                                ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="message_msg">Votre message :</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea type="textarea" name="message_msg" rows="4" cols="50" required></textarea>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <p>
                                    <?php
                                    if(isset($_GET['succes']))
                                    {
                                        echo'<p class ="succesPost txt-center">Message posté</p>';
                                    }
                                    ?>
                                </p>
                                <button type="submit" name="send" id="sbmit_btn">Envoyer</button>
                            </td>
                        </tr>
                    </tfoot>    
                </form>        
            </table>
        </section>
    </main>
</body>
</html>