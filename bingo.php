<?php
$bingoValuesArray = [];
$minRange = [];
$numberOfColumns = 5;
$rangeDiff = 15;
$freeSpaceLocation = 2;

function randomArray($condition,$min,$max) {
	global $bingoValuesArray;
	while (count($bingoValuesArray) < $condition) { 
		$rand = rand($min,$max);
		array_push($bingoValuesArray,$rand);
		$bingoValuesArray = array_unique($bingoValuesArray);
	}
}

for ($j=-1; $j < $numberOfColumns-1; $j++) { 
	$minRange[] = ($rangeDiff * $j) + $rangeDiff + 1;
}

for ($i=0; $i < $numberOfColumns; $i++) {
	randomArray(($numberOfColumns * $i) + $numberOfColumns,$minRange[$i],($rangeDiff * $i) + $rangeDiff);
}

$bingoValuesArray = array_chunk($bingoValuesArray,$numberOfColumns);

$bingoValuesArray[$freeSpaceLocation][$freeSpaceLocation]="Free Space";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
	<style>
	html, body { 
		height: 100%; 
		width: 100%;
	}
	body div {
		height: 80%;
		width: 80%;
		padding: 5%;
	}
	table {
		height: 70%;
		width: 80%;
		float: center;
		text-align: center;
	}
	td, tr {
		width: 5%;
		background: #00FFFF;
		font-size: 20px;
		border: 1px solid black;
	}
	th {
		background: #F5F5DC;
		color: #00008B;
		border: 1px solid black;
	}
	td:only-child {
		background: white;
		border: hidden;
	}
	button {
		font-size: 15px;
	}
	a {
		color: black;
		text-decoration: none;
		border: black solid 1px;
		padding: 5px;
		background: #F5F5DC;
	}
	</style>
</head>

<body>
	<div>
	<?php
		echo "
		<table>
			<thead>
			<tr>
				<th>B</th>
				<th>I</th>
				<th>N</th>			
				<th>G</th>			
				<th>O</th>				
			</tr>
			</thead>
			<tbody>";
			for ($i=0; $i < $numberOfColumns; $i++) { 
				echo "<tr>";
				for ($j=0; $j < $numberOfColumns; $j++) { 
					echo "<td>" . $bingoValuesArray[$j][$i] . "</td>";
				}
				echo "</tr>";
			}
			echo "<tr><td colspan=5><a href=\"" . $_SERVER["PHP_SELF"] . "\">Refresh</a></td></tr>
			</tbody>
		</table>";
	?>
	</div>
</body>

</html>
