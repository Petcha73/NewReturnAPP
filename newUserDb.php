<?php
	//connect to data base
	include 'config.php';
	include 'connectDb.php';
	//*****GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST
	
	$name= 	isset($_POST['name']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['name'])) 	: '';
	$email= 	isset($_POST['email']) 		? 	$mysqli->real_escape_string(htmlspecialchars($_POST['email'])) 		: '';
	$motdepasse= 	isset($_POST['motdepasse']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['motdepasse'])) 	: '';
	$departement= 	isset($_POST['department']) 		? 	$mysqli->real_escape_string(htmlspecialchars($_POST['department'])) 		: '';

	

	
	//*****DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION*****
	try
	{
		$query = "INSERT INTO `$db`.`$dbUser`(Email,Nom,Motdepasse,Departement) VALUES ('$email','$name','$motdepasse','$departement');";
		$mysqli -> query($query);
		
		if(mysql_errno()){
			echo "MySQL error ".mysql_errno().": "
			.mysql_error()."\n<br>When executing <br>\n$query\n<br>";
		}
				
	//	header('location:http://'.$webAdress["ip"].'/'.$webAdress["dir"].'/index.php'); 
		echo $query ;
			
	}catch(NAClientException $ex)
	{
		echo "Action failed\n";
	}
		
?>

