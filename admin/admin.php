<?PHP
    session_start();
    include("../functions/db.php");
    include("../functions/auth.php");
    $sql = db_ini();
    if (!$info = db_fetch($sql, "SELECT `admin` FROM `Users` WHERE login='".$_SESSION['login']."';"))
        header("Location: ../home/index.php");
    if ($_POST['BACK'] == "Go Back")
        header("Location: ../home/index.php");
?>

<html>
	<head>
		<style>
			.t1 {
                text-align: left;
                position: relative;
                background-color:black;
                height:300px;
                width:250px;
                color:white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .t2 {
                text-align: center;
                position: relative;
                background-color:black;
                height:150px;
                width:250px;
                font-size: 18px;
                color:white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .t3 {
                text-align: center;
                position: relative;
                background-color:black;
                height:300px;
                width:250px;
                font-size: 18px;
                color:white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .i {
                position: absolute;
                left: 25%;
                width: 72%;
            }
            .i2 {
                position: relative;
                width: 72%;
            }
            h1{
                text-align: center;
                position:relative;
                color:white;
            }
            header {
                width:100%;
                height:10%;
                background-color:black;
                position:relative;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .m {
                position: absolute;
                left: 2%;
                width: 75px;
                background-color: white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .i3 {
                position:relative;
                text-align:center;
                background-color:brown;
                color:white;
                border-radius:5px;
                width: 75px;
            }
		</style>
        <header>
            <br/><h1><u>Hello You Mighty One !</u></1>
            <form class="m" method="post" action="admin.php">
                <input class="i3" type="submit" name="BACK" value="Go Back"></input>
            </form>
        </header><br/>
	</head>
	<body>
		<form class="t1" action="addprod.php" method="post">
            <h3 align="center";><u>Ajouter un nouveau produit.</u></h3>
            Name :<input class="i" type="text" name="name" value=""></input><br/><br/>
            Color:<input class="i" type="text" name="color" value=""></input><br/><br/>
            Degree:<input class="i" type="float" name="degree" value=""></input><br/><br/>
            Price :<input class="i" type="float" name="price" value=""></input><br/><br/>
            Country:<input class="i" type="text" name="country" value=""></input><br/><br/>
            Image :<input class="i" type="text" name="img" value=""></input><br/><br/>
            <input style="position:relative; left:5%; width:90%; height: 50%;" type="submit" name="addprod" value="OK"></input>
        </form>
        <form class="t2" action="delprod.php" method="post">
            <h3 align="center";><u>Effacer un produit.</u></h3>
            Name :<br/><input class="i2" type="text" name="name" value=""></input><br/><br/>
            <input style="position:relative; width:90%; height: 50%;" type="submit" name="delprod" value="OK"></input>
        </form>
        <form class="t3" action="modifprod.php" method="post">
            <h3 align="center";><u>Modifier le prix d'un produit.</u></h3>
            Name :<br/><input class="i2" type="text" name="name" value=""></input><br/><br/>
            Old Price :<br/><input class="i2" type="text" name="oldprice" value=""></input><br/><br/>
            New Price :<br/><input class="i2" type="text" name="newprice" value=""></input><br/><br/>
            <input style="position:relative; width:90%; height: 50%;" type="submit" name="modifprod" value="OK"></input>
        </form>
	</body>
</html>
