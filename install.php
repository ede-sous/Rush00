<?PHP
include("./functions/get_prod.php");

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
	degree FLOAT NOT NULL,
	price FLOAT NOT NULL,
	country VARCHAR(255) NOT NULL,
	img VARCHAR(255) NOT NULL,
	PRIMARY KEY (id));")))
	return (print("Problem creating the table.\n"));

if (!(mysqli_query($sql, "CREATE TABLE basket (
	id INT NOT NULL AUTO_INCREMENT,
	login VARCHAR(255) NOT NULL,
	products_count VARCHAR(255) NOT NULL,
	cost FLOAT NOT NULL,
	PRIMARY KEY (id));")))
	return (print("Problem creating the table.\n"));

$info = get_products();

foreach($info as $elem)
{
	if (!(mysqli_query($sql,"INSERT INTO products (`id`, `name`, `color`, `degree`, `price`, `country`, `img`) VALUES (NULL,'".$elem[0]."','".$elem[1]."', '".$elem[2]."', '".$elem[3]."', '".$elem[4]."', '".$elem[5]."');")))
		return (print("Problem creating beer.\n"));
}

if (!(mysqli_query($sql,"INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL,'ede-sous','".hash("whirlpool", "patate")."', '1');")))
	return (print("Problem creating the admin.\n"));
if (!(mysqli_query($sql,"INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL,'gschaetz','".hash("whirlpool", "gaspard2")."', '1');")))
	return (print("Problem creating the admin.\n"));


mysqli_close($sql);
?>
