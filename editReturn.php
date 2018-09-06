
<?php
	
	//connect to data base
	
	include 'connectDb.php';
	include("config.php"); //include config file
	
	$recievedMessage = "";
	$edit = isset($_POST['edit']) ? $mysqli->real_escape_string(htmlspecialchars($_POST['edit'])) : '';
	
	$query = "SELECT * FROM `$dbTable` WHERE `id`='$edit'";
	
	$result = $mysqli-> query($query);
	
	// get all data from database
	if ($result->num_rows > 0) {
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			
			$id= $row["id"];
			$ticket= $row["ticket"];
			$email=$row["email"];
			$adress=$row["adress"];
			$order=$row["orderNum"];
			$guarenty= $row["guarenty"];
			$module= $row["module"];
			$serial= $row["serial"];
			$issue1=$row["issue1"];
			$issue2=$row["issue2"];
			$issue3=$row["issue3"]; 
			$remark=$row["remark"];
			$agent=$row["agent"];
			$technicien= $row["technicien"];
			$complete= $row["complete"];   
			$observation=$row["observation"];
			$correction=$row["correction"];
			$solution= $row["solution"];
			$commentry=$row["commentry"];
			$dateSetup= $row["dateSetup"];
			$dateReturn=$row["dateReturn"];
			$dateIn=$row["dateIn"];
			$dateRepair=$row["dateRepair"];
			$dateOut=$row["dateOut"];
			$trackIn=$row["trackIn"];
			$trackOut=$row["trackOut"];
			$status=$row["status"];
			
		}
	} 
	else {
		
		echo $result->num_rows;
		
	}
	
	
	include("header.php");
	
	
	
	$recievedMessage = "yes we recived your parcel on $dateIn";

	
?>

<body id="editReturnPageBody" >
	
	
	<form class="myForm" id="editReturnPageForm" action="editReturnPrintDb.php" method="post">
		
		
		
		<input type="hidden" name="id" value="<?= $id ?>">
		<h2>
			
			<label>#<?= $id ?></label>
			Edit Return 
			
			<span>Please fill all the fields</span>
			
		</h2>
		
		
		
		<label>
			<span>Status :</span>
			<select id="status"name="status" >
				
				<?php
					foreach($statusList as $value):
					echo'<option'; if($status==$value){ 
					echo' selected="selected" '; } 
					echo' value="'.$value.'">'.$value.'</option>';
					endforeach;
				?>
				
			</select>
		</label> 
		
		
		<div id="saveChange">
			<span>&nbsp;</span>
			<input class="button" type="submit" value="Save Changes">
			<input class="button" type="button" value="Cancel"  onClick="history.go(-1)">
		</div>
		
		
		
		
		
		<p class=lineTitle >						
			Client
			<img id="togClient"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>
		<hr id="myHr">
		
		
		
		<div  id="clientDiv">
			<label>
				<span>Ticket :</span>
				<input  name="ticket" type="text" value="<?= $ticket ?>" required>
			</label>
			
			
			
			<label>
				<span>E-mail :</span>
				<input name="email" type="email" value="<?= $email ?>" required>
			</label>
			
			<label>
				<span>Adress-Tel :</span>
				<textarea name="adress" type="text" ><?=$adress ?> </textarea>
			</label>
			
		</div>
		
		
		
		
		<p class=lineTitle >
			Accueil
			<img id="togAccueil"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>	
		<hr id="myHr">
		
		<div  id="accueilDiv">
			
			<label >
				<span>Date In :</span>
				<input  class="receptionI" name="dateIn" type="date" value="<?= $dateIn ?>">
				
			</label>
			
			
			<img  onclick="sendMailIn()" src="img/mail.png" style="height: 25px;	width: 25px; opacity:0.7; padding:1px; position:relative; bottom:-10px;">
			
			<label>
				<span>Track Out :</span>
				<input class="shipmentI" name="trackOut" type="text" value="<?= $trackOut ?>"  >
			</label>
			
			<img  onclick="sendMailOut()" src="img/mail.png" style="height: 25px;	width: 25px; opacity:0.7; padding:1px; position:relative; bottom:-10px;">
			
			<label>
				<span>Date Out :</span>
				<input  class="shipmentI" name="dateOut" type="date" value="<?= $dateOut ?>" >
			</label>
			
		</div>
		
		
		
		<p class=lineTitle >
			Order
			<img id="togOrder"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>
		<hr id="myHr">
		
		<div  id="orderDiv">
			<label>
				<span>Order Number :</span>
				<input  name="orderNum" type="text" value="<?= $order ?>" required>
			</label>
			
			<label>
				<span>Setup Date :</span>
				<input  name="dateSetup" type="date" value="<?= $dateSetup ?>" required>
			</label>
			
			<label>
				<span>Under Guarenty :</span>
				<input  name="guarenty" type="text" value="<?= $guarenty ?>" required>
			</label>
		</div>
		
		<p class=lineTitle >
			Module
			<img id="togModule"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>
		<hr id="myHr">
		
		<div  id="moduleDiv">
			<label>
				<span>Module :</span>
				<input  name="module" type="text" value="<?= $module ?>" required>
			</label>
			
			<label>
				<span>Serial :</span>
				<input  name="serial" type="text" value="<?= $serial ?>" required>
			</label>
			
			<label>
				<span>Issue :</span>
				
				<input  name="issue1" type="text" value="<?= $issue1 ?>" required>
				
				<?php
					if ($issue2!=""){
						echo'<span>2nd Issue :</span>';
						echo'<input  name="issue2" type="text" value="'.$issue2.'" >';						
					}
					if ($issue3!=""){
						echo'<span>3rd Issue :</span>';
						echo'<input  name="issue3" type="text" value="'.$issue3.'" >';				
					}
					
				?>				
			</label>
			
		</div>
		
		<p class=lineTitle >
			Return
			<img id="togReturn"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>
		<hr id="myHr">
		
		<div  id="returnDiv">
			<label>
				<span>Return Date :</span>
				<input  name="dateReturn" type="date" value="<?= $dateReturn ?>" required>
			</label>
			
			<label>
				<span>Track In :</span>
				<input  name="trackIn" type="text" value="<?= $trackIn ?>" required>
			</label>
			
			<label>
				<span>Agent :</span>
				<input name="agent" type="text" value="<?= $agent ?>" required>
			</label>
			
			
		</div>
		
		
		
		
		<p class=lineTitle >	
			Testing
			<img id="togTesting"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>	
		<hr id="myHr">
		
		
		<div  id="testingDiv">
			
			<label>
				
				<span>Complete :</span>
				<select class="reparationI" name="complete" >
					<option selected disabled value="">Please select</option>
					<option <?php if($complete=="yes"){ ?> selected="selected"<?php ; } ?> value="yes">yes</option>
					<option <?php if($complete=="no"){ ?> selected="selected"<?php ; } ?> value="no">no</option>
				</select>
			</label>
			<label>
				<span>Remark :</span>
				<input  name="remark" type="text" value="<?=$remark ?>">
			</label>
			
			<label>
				<span>Commentary :</span>
				<textarea    name="commentry" type="text" ><?=$commentry ?></textarea>
			</label>
			
			<label>
				<span>Observation :</span>
				<textarea    name="observation" type="text" ><?=$observation ?></textarea>
			</label>
			
		</div>
		
		<p class=lineTitle >
			
			Repair
			<img id="togRepair"src="img/eye1.png" style="height: 10px;	width: 20px; opacity:0.7; padding:0px; position:relative; bottom:0px; ">
		</p>	
		<hr id="myHr">
		
		<div  id="repairDiv" >
			
			<label>
				<span>Correction :</span>
				<textarea class="reparationI"  name="correction" type="text" ><?=$correction ?> </textarea>
			</label>
			<img  onclick="showHelp()" src="img/help.png" style="height: 32px;	width: 32px; opacity:0.7; padding:1px; position:relative; bottom:55px;">
			
			<label>
				<span>Solution :</span>
				<select class="reparationI" name="solution" >
					<option selected disabled value="">Please select</option>
					
					<?php
						foreach($solutionList as $value):
						echo'<option'; if($solution==$value){ 
						echo' selected="selected" '; } 
						echo' value="'.$value.'">'.$value.'</option>';
						endforeach;
					?>
					
				</select>
			</label>
			
			<label>
				<span>Date Repair :</span>
				<input  class="shipmentI" name="dateRepair" type="date" value="<?= $dateRepair ?>" >
			</label>
			
			<label>
				<span>Technicien :</span>
				<select class="reparationI" name="technicien" >
					<option selected disabled value="">Please select</option>
					
					<?php
						foreach($technicienList as $value):
						echo'<option'; if($technicien==$value){ 
						echo' selected="selected" '; } 
						echo' value="'.$value.'">'.$value.'</option>';
						endforeach;
					?>
					
				</select>
			</label>
			
		</div>
		
		
	</form>
	
	<script>
		$(document).ready(
		function(){	
			$("#togClient").click(function(){
				$("#clientDiv").toggle(200);
			});
			
			$("#togAccueil").click(function(){
				$("#accueilDiv").toggle(200);
			});
			
			$("#togOrder").click(function(){
				$("#orderDiv").toggle(200);
			});
			
			$("#togModule").click(function(){
				$("#moduleDiv").toggle(200);
			});
			
			$("#togReturn").click(function(){
				$("#returnDiv").toggle(200);
			});
			
			$("#togTesting").click(function(){
				$("#testingDiv").toggle(200);
			});
			$("#togRepair").click(function(){
				$("#repairDiv").toggle(200);
			});
		}
		);
	</script>
	
	
	
	
	<script>
		
		var to = "to@to.com";
		$from = "from@from.com";
		$subject = "subject";
		$message = "this is the message body";
		
		$headers = "From: $from"; 
		//$ok = @mail($to, $subject, $message, $headers, "-f " . $from); 
		
		var email= "<?php echo $email ?>";
		var body="<?php echo $recievedMessage ?>";
		
	
		
		
		
		$(document).ready(
		function(){
			
			
			
			switch($( "#status" ).val()){
			
			
				
				case "Pre-sent" : showTheSectionOf(1);
				
			
				break;
				
				case "Waiting" : showTheSectionOf(2); 
				
				break;
				
				case "Canceled" : showTheSectionOf(3); break;
				
				case "Recieved" : showTheSectionOf(4); break;
				
				case "Refunded" : showTheSectionOf(5); break;
				
				case "Pre-Testing" : showTheSectionOf(6); break;
				
				case "Post-Testing" : showTheSectionOf(7); break;
				
				case "Ready-to-ship" : showTheSectionOf(8); break;
				
				case "Done" : showTheSectionOf(9); break;
			};
		}
		);
		
		
	
		
		
		$(document).ready(
		$("#status").on("change",function () {
			
			switch($( "#status" ).val()){
				
				case "Pre-sent" : showTheSectionOf(1); break;
				
				case "Waiting" : showTheSectionOf(2); break;
				
				case "Canceled" : showTheSectionOf(3); break;
				
				case "Recieved" : showTheSectionOf(4); break;
				
				case "Refunded" : showTheSectionOf(5); break;
				
				case "Pre-Testing" : showTheSectionOf(6); break;
				
				case "Post-Testing" : showTheSectionOf(7); break;
				
				case "Ready-to-ship" : showTheSectionOf(8); break;
				
				case "Done" : showTheSectionOf(9); break;
			}
			
		})
		
		);
		
		
		
		
		function showHelp(){
			window.open("pdf/main_chauffe.pdf");
		}
		
		function sendMailIn(){
			window.open('mailto:'+email+'?subject=Recieved&body='+body+'');
			
		}
		
		function sendMailOut(){
			window.open('mailto:'+email+'?subject=Recieved&body='+body+'');
			
		}
		
		function showTheSectionOf(a){ 
		
		
		
			
			$( "#clientDiv" ).hide();
			$( "#accueilDiv" ).hide();
			$( "#orderDiv" ).hide();
			$( "#moduleDiv" ).hide();
			$( "#returnDiv" ).hide();
			$( "#testingDiv" ).hide();
			$( "#repairDiv" ).hide();
			
			
				$( ".receptionI" ).removeAttr("required");
				$( ".reparationI" ).removeAttr("required");
				$( ".shipmentI" ).removeAttr("required");
			
			
			switch(a){
				
				case 1 : 
				
				
				break;
				
				case 2 : 
				
				$( "#clientDiv" ).show();
				$( "#accueilDiv" ).show();				
				$( "#moduleDiv" ).show();	
				
					$( ".receptionI" ).attr("required","required");  
				
				
				break;
				
				case 3 : 
				
				$( "#clientDiv" ).show();
				$( "#accueilDiv" ).show();
				$( "#orderDiv" ).show();
				$( "#moduleDiv" ).show();	
				
				break;
				case 4 : 
				
				$( "#clientDiv" ).show();
				$( "#accueilDiv" ).show();

				
				
				break;
				case 5 : 
				
				$( "#clientDiv" ).show();
				$( ".accueilDiv" ).show();
				$( ".orderDiv" ).show();
				$( ".moduleDiv" ).show();	
				
				break;
				case 6 : 
				
				$( "#accueilDiv" ).show();
				$( "#moduleDiv" ).show();
				$( "#testingDiv" ).show();
				$( "#repairDiv" ).show();
				
				break;
				
				case 7 : 
				
				$( "#moduleDiv" ).show();
				$( "#testingDiv" ).show();
				$( "#repairDiv" ).show();
				
				break;
				
				case 8 : 
				
				$( "#clientDiv" ).show();
				$( "#accueilDiv" ).show();
				
				break;
				
				case 9 : 
				
				$( "#clientDiv" ).show();
				$( "#accueilDiv" ).show();
				$( "#orderDiv" ).show();
				$( "#moduleDiv" ).show();
				$( "#returnDiv" ).show();
				$( "#testingDiv" ).show();
				$( "#repairDiv" ).show();
				
				break;
			}
			
		}
		
	</script>
	
	
</body>
</html>
