<?PHP

$sql = mysqli_connect("localhost", "root", "superpass");

if (!mysqli_query($sql, "CREATE DATABASE edegsc"))
	return (print("Databases and Tables already installed.\n"));


mysqli_select_db($sql, "edegsc");

if (!(mysqli_query($sql, "CREATE TABLE Users (
	id INT NOT NULL AUTO_INCREMENT,
	login VARCHAR(255) NOT NULL,
	passwd VARCHAR(255) NOT NULL,
	admin BOOLEAN NOT NULL,
	PRIMARY KEY (id));")))
	return (print("Problem creating the table.\n"));

if (!(mysqli_query($sql, "CREATE TABLE products (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	color VARCHAR(255) NOT NULL,
	cereals VARCHAR(255) NOT NULL,
	price FLOAT NOT NULL,
	PRIMARY KEY (id));")))
	return (print("Problem creating the table.\n"));

if (!(mysqli_query($sql,"INSERT INTO `products` (`id`, `name`, `color`, `cereals`, `price`) VALUES (NULL,'chimay','blonde', 'houblon', '1.65')")))
	return (print("Problem creating beer.\n"));

if (!(mysqli_query($sql,"INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL,'ede-sous','".hash("whirlpool", "patate")."', '1')")))
	return (print("Problem creating the admin.\n"));
if (!(mysqli_query($sql,"INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL,'gschaetz','".hash("whirlpool", "gaspard2")."', '1')")))
	return (print("Problem creating the admin.\n"));


mysqli_close($sql);
?>
