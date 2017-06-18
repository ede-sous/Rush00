<html>
	<head>
		<style>
			.t {
                text-align: left;
                position: relative;
                background-color:black;
                height:20%;
                width:20%;
                color:white;
            }
            .i {
                position: absolute;
                left: 25%;
                width: 72%;
            }
		</style>
	</head>
	<body>
		<form class="t" action="addprod.php" method="post"><br/>
            Name :<input class="i" type="text" name="name" value=""></input><br/><br/>
            Color:<input class="i" type="text" name="color" value=""></input><br/><br/>
            Degree:<input class="i" type="float" name="degree" value=""></input><br/><br/>
            Price :<input class="i" type="float" name="price" value=""></input><br/><br/>
            Country:<input class="i" type="text" name="country" value=""></input><br/><br/>
            <input style="position:relative; left:5%; width:90%; height: 50%;" type="submit" name="addprod" value="OK">
        </form>
	</body>
</html>
