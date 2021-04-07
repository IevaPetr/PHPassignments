<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title>3.2</title>
		<meta charset="utf-8">
	<style>
		.info{width:500px; margin:auto;}
		.klaida{color:red; text-align: center;}
</style>
</head>

<body>
<div class="info">
	<?php echo date('Y-m-d H:i'); ?>
<h1>Stačiojo trikampio įžambinės, perimetro ir ploto skaičiuoklė</h1>

<?php
//duomenys is formos grazinami per sisteminius masyvus
//jei formoje nera atributo method - tai yra masyvas $_GET
//siame masyve elementu yra tiek, kiek formos elementu turi name
echo count($_GET);//2
//kokie indexai? tokie patys kaip formos elementu name
echo '<br>'.$_GET['A']. ' '.$_GET['B'];
////////////////
$a=$_GET['A'];
$b=$_GET['B'];
if($a=='' or $b== ''){ 
	echo '<p class="klaida">Neuzpildyta</p>';
}
elseif($a<=0 or $b<=0){
	echo '<p class="klaida">Duomenu ivedimo klaida</p>';

}
else{

	$c=sqrt($a*$a+$b*$b);
	echo '<p>Kai a='.$a.' b='.$b. ' c=' .$c;
}



?>
</div>

	</body>
</html>