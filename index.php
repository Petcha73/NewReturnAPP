

<?php
	//connect to data base
	include 'connectDb.php';
	include 'config.php';
	
	//to keep the search string available
	$srch = isset($_GET['srch']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['srch'])) : '';
	
	include("header.php"); //include header 
	
?>

<body>
	
	
	<div id= "indexPageBodyBoxing" >
	<img id="indexPageBigLogo" src="img/logo.jpg">
	
	<form id="form" action="searchDb.php" method="post">
	
		
		
		<input id ="indexPageSearchBox" type="text" name="search" autofocus="autofocus" value="<?php echo $srch; ?>"/>
	
		
		<p id="indexPageButtonsRow">
			<input id="indexPageButton" type="submit" value="Search Database">
			<INPUT id="indexPageButton" value="New Return" TYPE="button" onClick="parent.location = 'http://<?php echo $webAdress["ip"]; ?>/<?php echo $webAdress["dir"]; ?>/createReturn.php'">
			
		</p>
		<p id="indexPageButtonsRow">
			

			</p>
	</form>
	
	</div>

	
</body>

</html>