<?php
	//connect to data base
	include 'connectDb.php';
	include 'config.php';
	
	include("header.php"); //include header 
	
?>

<body id="newUserBody">
	
	
	<form class="myForm" id="newUserForm" action="newUserDb.php" method="post">
		
		
		<h2>
			Create your Account
			<span>Please fill all the fields</span>
		</h2>
		
		
		<label>
			<span>Your Name:</span>
			<input  name="name" type="text" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Your E-mail :</span>
			<input name="email" type="email" id="idEmail" value="" required>
		</label>
		
		<label>
			<span>Password :</span>
			<input  name="motdepasse" id="motdepasse" type="password" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Retype Password :</span>
			<input  name="motdepasse" id="motdepasse" type="password" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Departement :</span>
			<select name="department" id="department" required>
				<option selected disabled value=""></option>
				<option value="Support Agent">Support Agent</option>
				<option value="Support Managers">Support Managers</option>
				<option value="RnD">"RnD"</option>
				<option value="Accueil">Accueil</option>
			</select>
		</label>
		
		
		<div id=createRerurnButton >
			
			<input class="button" type="submit" value="Save">
			<input class="button" type="button" value="Cancel"  onClick="cancelConfirm()">
		</div>	
		
	</form>
	
	
</body>

</html>