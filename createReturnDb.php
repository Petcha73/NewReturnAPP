<?php
	//connect to data base
	include 'connectDb.php';
	include 'config.php';
	
	//*****GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST
	
	$ticket= 	isset($_POST['ticket']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['ticket'])) 	: '';
	$email= 	isset($_POST['email']) 		? 	$mysqli->real_escape_string(htmlspecialchars($_POST['email'])) 		: '';
	$adress= 	isset($_POST['adress']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['adress'])) 	: '';
	$order= 	isset($_POST['order']) 		? 	$mysqli->real_escape_string(htmlspecialchars($_POST['order'])) 		: '';
	$dateSetup= isset($_POST['dateSetup']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['dateSetup'])) 	: '';
	$guarenty= 	isset($_POST['guarenty']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['guarenty'])) 	: '';
	$module= 	isset($_POST['module']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['module'])) 	: '';
	$issue1= 	isset($_POST['issue1']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['issue1'])) 	: '';
	$issue2= 	isset($_POST['issue2']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['issue2'])) 	: '';
	$issue3= 	isset($_POST['issue3']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['issue3'])) 	: '';
	$serial= 	isset($_POST['serial']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['serial'])) 	: '';
	$remark= 	isset($_POST['remark']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['remark'])) 	: '';
	$commentry= isset($_POST['commentry']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['commentry'])) 	: '';
	$trackIn= 	isset($_POST['trackIn']) 	? 	$mysqli->real_escape_string(htmlspecialchars($_POST['trackIn'])) 	: '';
	$agent= 	isset($_POST['agent']) 		? 	$mysqli->real_escape_string(htmlspecialchars($_POST['agent'])) 		: '';
	$status= 	"Waiting";
	

	
	//*****DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION*****
	try
	{
		$query = "INSERT INTO `$db`.`$dbTable` VALUES (NULL,'$ticket','$email','$adress','$order','$guarenty','$module','$serial','$issue1','$issue2','$issue3','$remark','$agent','','','','','','$commentry','$dateSetup',curdate(),NULL,NULL,NULL,'$trackIn','','$status')";
		$mysqli -> query($query);
		
		if(mysql_errno()){
			echo "MySQL error ".mysql_errno().": "
			.mysql_error()."\n<br>When executing <br>\n$query\n<br>";
		}
				
		header('location:http://'.$webAdress["ip"].'/'.$webAdress["dir"].'/index.php'); 
		echo $query ;
			
	}catch(NAClientException $ex)
	{
		echo "Action failed\n";
	}
		
?>

