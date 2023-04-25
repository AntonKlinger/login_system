<!DOCTYPE html>
<html>
<head>
    <link  rel="stylesheet" type="text/css" href="style.css">
    <script language="JavaScript" src="logic.js"></script>
</head>
<body>
    <div class="PopupRegistrieren" id="PopupRegistrieren">
        
    <?php
    if(isset($_POST["submit"])){
        echo '<p>Zwischenmeldung 1</p>';
        require("mysql.php");

        echo '<p>Zwischenmeldung 2</p>';

        $stmt = $mysql->prepare("SELECT * FROM nutzerdaten WHERE NUTZERNAME = :nutzername"); //Username überprüfen
        $stmt->bindParam(":nutzername", $_POST["nutzername"]);
        $stmt->execute();
        $count = $stmt->rowCount();

        echo '<p>Zwischenmeldung 3</p>';
        echo $count;

        if($count == 0){
            //Username ist Frei
            echo '<p>Username ist Frei</p>';

                if($_POST["passwort"] == $_POST["passwort2"]){
                    echo '<p>Die Passwörter stimmen überein</p>';
                    $stmt = $mysql->prepare("INSERT INTO nutzerdaten (NUTZERNAME, PASSWORT) VALUES (:nutzername, :passwort)");
                    $stmt->bindParam(":nutzername", $_POST["nutzername"]);
                    $stmt->bindParam(":passwort", $_POST["passwort"]);
                    $stmt->execute();
                    echo '<p>neuer Nutzer wurde angelegt</p>';

                }
                else {
                    echo '<p>Die Passwörter stimmen nicht überein</p>';
                }
        }
        else {
            echo '<p>Username bereits vegeben</p>';
        }
    }
    ?>

        <form action="index.php" method="post">
            <h1>Registrieren</h1>
            <input type="text" name="nutzername" placeholder="Nutzername" required><br>
            <input type="text" name="passwort" tplaceholder="Passwort" required><br>
            <input type="text" name="passwort2" placeholder="Passwort wiederholen" required><br>
            <button name="submit" type="submit" onclick="Registrieren()">Registrieren</button><br>
        </form>
    </div>
</body>
</html>

