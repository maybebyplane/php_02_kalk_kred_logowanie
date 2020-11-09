<?php

?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css">   
    <script src="https://kit.fontawesome.com/ba1daeddd3.js"></script>
</head>
<body>
<br />

<div style="width:80%; margin: 3em;">
    <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button fas fa-arrow-right"> Przejdź do kolejnej strony</a>
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button fas fa-lock"> Wyloguj</a>
</div>

<div style="width:80%; margin: 3em;">

<form action="<?php print(_APP_ROOT);?>/app/calc_kred.php" method="get" class="pure-form pure-form-aligned">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
	<label for="id_kwota">Kwota kredytu: </label>
	<input id="id_kwota" type="number" name="kwota" value="<?php out($kwota) ?>" "zł" />
	zł
        <p />
	<label for="id_lat">Kredyt na </label>
	<input id="id_lat" type="number" name="lat" value="<?php out($lat) ?>" />
	lat
	<p />
	<label for="id_op">Oprocentowanie: </label>
	<input id="id_op" type="number" name="op" value="<?php out($oprocentowanie) ?>" />
	%
	<p />
    </fieldset>
        <button type="submit" class="pure-button pure-button-primary fas fa-calculator"> Wylicz</button>
</form>

<?php
	//wyświetlanie listy błędów, jeśli istnieją:
if (isset($messages)) {
	echo '<ol style="margin: 40px; border-radius: 15px; padding: 20 px; background-color: #F00; color: white; width: 400px;">';
	foreach ($messages as $msg) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<br />
<?php if (isset($result) && empty($messages)) { ?>
<div style="margin-top: 2em; border-radius: 0.5em; padding: 1em; background-color: #058580; width: 25em; color: white">
<?php echo 'Miesięczna rata kredytu wynosi: '.$result.' zł.'; ?>
</div>
<?php } ?>

</div>

</body>
</html>