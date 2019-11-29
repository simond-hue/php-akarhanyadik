<?php include("adatbazis.php");?>
<?php $adatbazis = new adatbazis()?>
<?php $adatbazis->kapcsolodas()?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<meta charset="UTF-8">
	<title>Órai munka</title>
</head>
<body>
	<div class="bal">
		<form method="GET">
			<h3>Pontos keresés</h3>
			<input type="text" name="exact-search-input">
			<input type="hidden" name="action" value="exact-search">
			<input type="submit" value="Keresés">
		</form>
		<form method="GET">
			<h3>Nagyobb, mint</h3>
			<input type="number" name="greater-search-input">
			<input type="hidden" name="action" value="greater-search">
			<input type="submit" value="Keresés">
		</form>
	</div>
	<div class="jobb">
		<form method="GET">
			<h3>Részleges keresés</h3>
			<input type="text" name="partial-search-input">
			<input type="hidden" name="action" value="partial-search">
			<input type="submit" value="Keresés">
		</form>
		<form method="GET">
			<h3>X sor</h3>
			<input type="number" name="elso-x-sor-input">
			<input type="hidden" name="action" value="elso-x-sor">
			<input type="submit" value="Keresés">
		</form>
	</div>

	<?php 
	if(isset($_GET["action"])){
		if($_GET["action"] === "exact-search") 
			$adatbazis->exactSearch($_GET["exact-search-input"]);
		if($_GET["action"] === "partial-search")
			$adatbazis->partialSearch($_GET["partial-search-input"]);
		if($_GET["action"] === "greater-search")
			$adatbazis->greaterSearch($_GET["greater-search-input"]);
		if($_GET["action"] === "elso-x-sor")
			$adatbazis->elsoXSor($_GET["elso-x-sor-input"]);
	}
	else{
		$adatbazis->list();
	}
	?>
	</table>
</body>
</html>
<?php $adatbazis->kapcsolatbontas();?>