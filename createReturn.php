

<?php include("connectDb.php");?>
<?php include("config.php");?>



<?php
	
	// permet de récuperer les donnés du client depuis le lien de LiveAgent
	
	$mail = isset($_GET['mail']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['mail'])) : '';
	$adress = isset($_GET['adress']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['adress'])) : '';
	$order = isset($_GET['order_id']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['order_id'])) : '';
	$dateSetup = isset($_GET['date_setup']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['date_setup'])) : '';
	$serial = isset($_GET['mac']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['mac'])) : '';
	
?>

<?php include("header.php");?>


<body id="createReturnPageBody">
	
	<form class="myForm" id="createReturnForm" action="createReturnDb.php" method="post">
		
		<h2>
			New Return
			<span>Please fill all the fields</span>
		</h2>
		
		<label>
			<span>Client Language :</span>
			
			<fieldset  data-type="horizontal">
				<label> 
					<input type="radio" name="language" id="idLanguage" value="en"  >
					<img class ="language" src="img/en.png" alt="English" height="50px" width="50px">
				</label>
				
				<label> 
					<input type="radio" name="language" id="idLanguage" value="fr"  >
					<img class ="language" src="img/fr.png" alt="English"height="50px" width="50px" >
				</label>
				<label> 
					<input type="radio" name="language" id="idLanguage" value="de"  >
					<img class ="language" src="img/de.png" alt="English" height="50px" width="50px" >
				</label>
				
			</fieldset>
			
		</label>
		<label>
			<span>Client Ticket :</span>
			<input  name="ticket" type="text" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Client E-mail :</span>
			<input name="email" type="email" id="idEmail" value="<?= $mail ?>" required>
		</label>
		
		<label>
			<span>Client Firstname :</span>
			<input  name="prenom" id="idPrenom" type="text" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Client Lastname :</span>
			<input  name="nom" id="idNom" type="text" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Client Adress-Tel :</span>
			<textarea  name="adress" type="text" required> </textarea>
		</label>
		
		<label>
			<span>Seller :</span>
			
			
			<fieldset  data-type="horizontal" >
				<label> 
					<input type="radio" name="nameSeller" class="classSeller" value="1" >
					<img src="img/logo.jpg" alt="Netatmo" width="80px" height="15px" class="seller">
				</label>
				
				<label> 
					<input type="radio" name="nameSeller" class="classSeller" value="2" >
					<img src="img/reseller.jpg" alt="Reseller" width="80px" height="15px" class="seller">
				</label>
				
				
			</fieldset>
		</label>
		
		
		<label class="order">
			<span>Order Number :</span>
			<input   name="order" type="text" value="<?= $order ?>"  required>
		</label>
		
		<label>
			<span>Reason :</span>
			<select name="reason" id="idReason" required>
				<option selected disabled value=""></option>
				<option value="11">Rétractation / Incompatible</option>
				<option value="12">Rétractation / Installation - configuration</option>
				<option value="13">Rétractation / Ne convient pas</option>
				<option value="2">Réparation sous garantie</option>
				<option value="3">Réparation hors garantie</option>
			</select>
		</label>
		
		
		<label>
			<span>Purchase Date :</span>
			<input  name="dateSetup" id="idSetup" type="date" value="<?= $dateSetup ?>" required>
		</label>
		
		
		<label>
			<span>Module :</span>
			<select id="module" name="module" required>
				<option selected disabled value=""></option>
				
				<?php
					foreach($moduleTypes as $key => $value):
					echo '<option value="'.$key.'">'.$value.'</option>'; 
					endforeach;
				?>
				
			</select>
		</label>
		
		<label class="serial">
			<span>Serial :</span>
			<input  name="serial" id="serialVal" type="text" value="<?= $serial ?>" required>
		</label>
		
		<label class="issue">
			
			
			
			
			<?php
				// this prints all the issues, each 3 times		
				foreach($issueList as $key => $value):
				
				echo '<div id="'.$key.'">';
				
				for ($i=0; $i<$numberOfIssues; $i++) {
					
					$j=$i+1;
					echo'<span id="sp">Issue'.$j.':</span>';
					echo '<select id="issue'.$j.'" name="issue'.$j.'">
					<option selected disabled value=""></option>';
					
					foreach($$value as $value2):
					echo '<option value="'.$value2.'">'.$value2.'</option>'; 
					endforeach;
					
					echo'
					</select>'	;
					
				}
				
				echo '</div>';
				
				endforeach;
				
			?>
			
			
		</label>
		
		<label>
			<span>Remark :</span>
			<input  name="remark" type="text"  maxlength="50"> 
		</label>
		
		<label>
			<span>Commentary :</span>
			<textarea  name="commentry" type="text" > </textarea>
		</label>
		
		<input type="hidden" name="dateReturn" value="curdate()">
		
		<label>
			<span>Track In :</span>
			<input  name="trackIn" type="text"  required>
		</label>
		
		<label>
			<span>Agent :</span>
			<select id="agent" name="agent">
				<option selected disabled value=""></option>
				
				<?php
					foreach($agentName as $value):
					echo '<option value="'.$value.'">'.$value.'</option>'; 
					endforeach;
				?>
				
			</select>
		</label>
		
		<div id=createRerurnButton >			
			<input class="button" type="button" value="Generate" onclick="insertText('genText','idNom', 'idPrenom', 'idEmail','idSetup','idReason','idLanguage')">	
			<input id="copy" class="button" type="button" value="Copy" onclick="btnCopy('genText')">
		</div>
		
		<label>
			<span>Return Link :</span>
			<textarea  name="commentry" type="text" id="genText" readonly> </textarea>
		</label>
		
		
		<div id=createRerurnButton >
			
			<input class="button" type="submit" value="Save">
			<input class="button" type="button" value="Cancel"  onClick="cancelConfirm()">
		</div>	
		
	</form>
	
	<script>
		
		
		var codex1="";
		var gnom=""; 
		var gprenom =""; 
		var gemail =""; 
		var gsetup ="";
		var codex2 =""; 
		var lang =""; 
		var codex =""; 
		
		
		function cancelConfirm(){
				
			
			if (confirm("Are you sure?"))
			{
				history.go(-1);
			}
			
		};
		
		
		
		function btnCopy(toCopy)
		{
			
			var elemToCopy = document.getElementById(toCopy);
			
			elemToCopy.select();
			document.execCommand( 'copy' );
			
		}
		
		
		function insertText(elemID,nomID,prenomID,emailID,setupID,sellerID,reasonID,langID)
		{
			
			var elem = document.getElementById(elemID);
			
			
			gnom = document.getElementById(nomID).value;
			gprenom = document.getElementById(prenomID).value;
			gemail = document.getElementById(emailID).value;
			gsetup = document.getElementById(setupID).value;
			codex2 = document.getElementById(reasonID).value;
			lang = document.getElementById(langID).value;
			
	
			codex = codex1+codex2;
			
			if (gnom != "" && gprenom != "" && gemail != "" && gsetup != "" && codex1 != "" && codex2 != "" ){
				var linky = "https://easy-returns.com/"+lang+"/brands/netatmo?delivery_date="+gsetup+"&reason_code="+codex+"&first_name="+gprenom+"&last_name="+gnom+"&email="+gemail+"&order_number=&rma=&product_name=&product_reference=&product_weight=&serial_name=&serial_number=&size=M&weight=2";
				
				
				} else{
				var linky  = "Please complete the form before genarating a return link";
			}
			elem.innerHTML = linky;
			elem.focus();
			document.execCommand("copy");
		}
		
		
		$(document).ready( 		
		
		function(){ 
			
			$( ".issue" ).hide();
			$( ".order" ).hide();
			$( ".serial" ).hide();
		}
		
		);
		
		
		
		$(document).ready( 		
				
		$(".classSeller").on("click",function () {
			
			
						
			if(document.getElementsByName("nameSeller")[0].checked){
				
				codex1 = 1;
				$( ".order" ).show();
				
			}else{
					
				codex1 = 2;
				$( ".order" ).hide();
				
			}
				
		}
		));
		
		
		
		
		
		
		
		
		
		// when the document is ready and if the module champs is changed hide or show issues dependind on the product
		$(document).ready( 	
		
		
		
		$("#module").on("change",function () {
			
			$( ".issue" ).show();
			
			switch($( "#module" ).val()){
				
				case "NWS" : 
				showTheIssuesOf(1); 
				$( ".serial" ).show();
				$( "#serialVal" ).val("70:ee:50:");
				break;
				
				case "NHC" : 
				showTheIssuesOf(1); 
				$( ".serial" ).show();
				$( "#serialVal" ).val("70:ee:50:");
				break;
				
				case "NMM" : 
				showTheIssuesOf(1);
				$( ".serial" ).show();
				$( "#serialVal" ).val("70:ee:50:");
				break;
				
				case "NOM" : 
				showTheIssuesOf(1);
				$( ".serial" ).show();
				$( "#serialVal" ).val("02:00:00:");
				break;
				
				case "NIM" : 
				showTheIssuesOf(1);
				$( ".serial" ).show();
				$( "#serialVal" ).val("03:00:00:");
				break;
				
				case "NRG" : 
				showTheIssuesOf(2);
				$( ".serial" ).show();
				$( "#serialVal" ).val("05:00:00:");
				break;
				
				case "NWG" : 
				showTheIssuesOf(3);
				$( ".serial" ).show();
				$( "#serialVal" ).val("06:00:00:");
				break;		
				
				case "NTH" : showTheIssuesOf(4); break;
				
				case "TPG" : showTheIssuesOf(4); break;
				
				case "THM" : showTheIssuesOf(4); break;
				
				case "NJB" : showTheIssuesOf(5); break;
				
				case "NSC" : showTheIssuesOf(6); break;
				
				case "NDT" : showTheIssuesOf(6); break;
				
				case "NOC" : showTheIssuesOf(6); break;
				
			}
			
		}));
		
		function showTheIssuesOf(a){ 
			
			$( "#station" ).hide();
			$( "#rain" ).hide();
			$( "#wind" ).hide();
			$( "#thermostat" ).hide();
			$( "#june" ).hide();
			$( "#welcome" ).hide();
			
			switch(a){
				
				case 1 :  $( "#station" ).show(); break;
				case 2 :  $( "#rain" ).show(); break;
				case 3 :  $( "#wind" ).show(); break;
				case 4 :  $( "#thermostat" ).show(); break;
				case 5 :  $( "#june" ).show(); break;
				case 6 :  $( "#welcome" ).show(); break;
				
			}
		}
		
	</script>
	
	
</form>
</body>
</html>
