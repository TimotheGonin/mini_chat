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
        <section id="msg"></section>
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
                                <label for="pseudo">Votre pseudo :</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="pseudo">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txtArea">Votre message :</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea type="textarea" name="txtArea" rows="4" cols="50"></textarea>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
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