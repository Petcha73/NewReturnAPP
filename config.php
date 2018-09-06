<?php
	
	//database variable ............................
	
	$servername = "localhost";
	$username   = "sav";
	$password   = "aigeeMo0ae";
	$db         ="sav";
	$dbTable = "returntest"; 
	$dbUser = "members";
	
	//...............................................
	
	
	
	
	$numberOfIssues = 3;
	
	$webAdress = array
	(
	
	"ip" => "localhost",
	"dir" => "SavNew"	
	
	);
	
	$technicienList = array
	(
	
	"Adrian",
	"Alessandra",
	"Alexis",
	"Axel",
	"Brieuc",
	"Clémence",
	"Clément",
	"Florian",
	"Frédéric",
	"Guillaume",
	"Kevin",
	"Prashanth",
	"Sanjeevan",
	"Sendy",
	"Yannick"		
	);
	
	$solutionList = array
	(
	
	"Repaired",
	"Returned",
	"Swapped(new)",
	"Swapped(ref)"
	
	);
	
	$statusList = array
	(
	"Pre-sent",
	"Waiting",
	"Canceled",
	"Recieved",
	"Refunded",
	"Pre-Testing",
	"Post-Testing",
	"Ready-to-ship",
	"Done"
	);			
	
	$issueList = array
	(
	
	"station" => "nwsIssues",
	"thermostat" => "nthIssues",
	"rain" => "nrgIssues",
	"wind" => "nwgIssues",
	"june" => "njbIssues",
	"welcome" => "nscIssues"
	
	);
	
	$months = array
	(
	
	"1" => "January",
	"2" => "February",
	"3" => "March",
	"4" => "April",
	"5" => "May",
	"6" => "June",
	"7" => "July",
	"8" => "August",
	"9" => "September",
	"10" => "October",
	"11" => "November",
	"12" => "December"
	
	);
	
	$year = array
	(
	
	"1" => "2015",
	"2" => "2016",
	"3" => "2017",
	
	
	);
	
	$moduleTypes = array
	(
	
	"NHC" => "Home Coach",
	"NWS" => "Weather station (full)",
	"NMM" => "Main unit (only)",
	"NOM" => "Outdoor unit (only)",
	"NIM" => "Additional Indoor unit",
	"NRG" => "Rain Gauge",
	"NWG" => "Wind Gauge",
	"NWM" => "Mount",
	"NTH" => "Thermostat (full)",
	"TPG" => "TPG",
	"THM" => "THM",
	"NJB" => "June",
	"NSC" => "Welcome",
	"NOC" => "Presence",
	"NDT" => "Tag"
	
	);
	
	
	$agentName = array
	(
	
	"Adrian",
	"Aurélie",
	"Ayaz",
	"Alessandra",
	"Bilal",
	"Brieuc",
	"Cédric",
	"Clémence",
	"Florian",
	"Frédéric",
	"irene",
	"Maxime",
	"Meri",
	"Nathalie",
	"Olivier",
	"Pablo",
	"Prashanth",
	"Sendy",
	"Tyler",
	"Valdemar"	
	);
	
	
	$nwsIssues = array
	(
	
	"Bluetooth",
	"Co2",
	"Dead",
	"Energy",
	"Humidity",
	"Mechanical",
	"Mesure",
	"Pressure",
	"Radio",
	"Refund",
	"Sono",
	"Temperature",
	"Touch",
	"USB",
	"Wifi"
	
	);
	
	$nthIssues = array
	(
	
	"Buttons",
	"cosmetic",
	"Dead",
	"Energy",
	"LDO",
	"Led",
	"Mechanical",
	"Pins",
	"Power Supply",
	"Radio",
	"Refund",
	"Screen",
	"Switching Relay",
	"Temperature",
	"Wifi"
	
	);
	
	$nrgIssues = array
	(
	
	"Battey Contact",
	"Dead",
	"Energy",
	"Measure",
	"Mechanical",
	"Radio",
	"Refund",
	"Wifi"
	
	);
	
	$nwgIssues = array
	(
	
	"Battey Contact",
	"Dead",
	"Energy",
	"Measure",
	"Mechanical",
	"Radio",
	"Refund",
	"Wifi"
	
	);
	
	$njbIssues = array
	(
	
	"Battey Contact",
	"Dead",
	"Energy",
	"Measure",
	"Mechanical",
	"Radio",
	"Refund",
	"Wifi"
	
	);
	
	
	$nscIssues = array
	(
	
	"Bluetooth",
	"Boot",
	"Camera",
	"Dead",
	"Energy",
	"Filter",
	"InfraRed",
	"Mechanical",
	"Mic",
	"Other",
	"Radio",
	"Refund",
	"SDcard",
	"Sound",
	"Update",
	"Wifi"
	
	);
	
?>
