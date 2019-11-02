<html>
<body>

<?php
 include("config.php");

if(!empty($_POST['check_list'])){
	$selektovaneNamirnice = "(";
	foreach($_POST['check_list'] as $selected){
		$selektovaneNamirnice .= $selected;
		$selektovaneNamirnice .= ",";
	}
	$selektovaneNamirnice = rtrim($selektovaneNamirnice,',');
	$selektovaneNamirnice .=")";
	//echo $selektovaneNamirnice;
	$query = "select distinct r.Ime as htmlName,re.Ime as nameRecepta, count(*) as broj from receptnamirnica r
	join recept re on r.ReceptID = re.Id where r.NamirniceId in ";
	$query .= $selektovaneNamirnice;
	$query .= " group by r.receptID having broj= ( select count(*) from receptnamirnica where receptId = r.ReceptID)";
	
	$result = mysqli_query($db,$query);
	if(mysqli_num_rows($result)==0) echo("Za unete namirnice nisu pronadjeni recepti");
	while($row = mysqli_fetch_array($result)){
		echo "<a href='recepti/".$row['htmlName']."'><h3>".$row['nameRecepta']."</h3></a>";
	}
		 
}
$db->close();


?>
 
</body>
</html>
