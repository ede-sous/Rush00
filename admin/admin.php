<html>
	<head>
		<style>
			.t1 {
                text-align: left;
                position: relative;
                background-color:black;
                height:250px;
                width:20%;
                color:white;
            }
            .t2 {
                text-align: center;
                position: relative;
                background-color:black;
                height:150px;
                width:20%;
                font-size: 18px;
                color:white;
            }
            .t3 {
                text-align: center;
                position: relative;
                background-color:black;
                height:275px;
                width:20%;
                font-size: 18px;
                color:white;
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
		</style>
	</head>
	<body>
		<form class="t1" action="addprod.php" method="post">
            <h3 align="center";><u>Ajouter un nouveau produit.</u></h3>
            Name :<input class="i" type="text" name="name" value=""></input><br/><br/>
            Color:<input class="i" type="text" name="color" value=""></input><br/><br/>
            Degree:<input class="i" type="float" name="degree" value=""></input><br/><br/>
            Price :<input class="i" type="float" name="price" value=""></input><br/><br/>
            Country:<input class="i" type="text" name="country" value=""></input><br/><br/>
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
