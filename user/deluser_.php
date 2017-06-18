<html>
    <head>
        <style>
        .t1 {
            text-align: center;
            position: relative;
            background-color:black;
            height:150px;
            width:20%;
            font-size: 18px;
            color:white;
        }
        .i {
            position: relative;
            width: 72%;
        }
        h1 {
            color: black;
            text-align: center;
        }
        </style>
        <h1><u>Vous allez effacer votre compte.</u></h1>
    </head>
    <body>
        <form class="t1" action="deluser.php" method="post">
            Êtez vous sur de vouloir efface votre compte?<br/>
            Mot de Passe:<br/><input class="i" type="text" name="passwd" value=""></input><br/><br/>
            <input style="position:relative; width:90%; height: 50%;" type="submit" name="deluser" value="EFFACER"></input>
        </form>
    </body>
</html>
