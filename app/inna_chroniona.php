<?php
require_once dirname(__FILE__).'/../config.php';
//ochrona widoku
include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Chroniona strona</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css">   
        <script src="https://kit.fontawesome.com/ba1daeddd3.js"></script>
</head>
<body>

<div style="width:80%; margin: 3em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/calc_kred.php" class="pure-button fas fa-arrow-left"> Powrót do kalkulatora</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active fas fa-lock"> Wyloguj</a>
</div>

<div style="width:80%; margin: 3em auto;">
	<p>To jest kolejna chroniona strona</p>
</div>	

</body>
</html>