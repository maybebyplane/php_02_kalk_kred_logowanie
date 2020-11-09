<?php

require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów

function getParams(&$kwota,&$lat,&$oprocentowanie){
    
    $kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
    $lat = isset($_REQUEST ['lat']) ? $_REQUEST ['lat'] : null;
    $oprocentowanie = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
}


// 2. walidacja = sprawdzenie parametrów

function validate(&$kwota,&$lat,&$oprocentowanie,&$messages){
    	
    if ( ! (isset($kwota) && isset($lat) && isset($oprocentowanie))) {
	return false;
    }
	
    if ($kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu.';
    }
    if ($lat == "") {
	$messages [] = 'Nie podano na ile lat pobiera się kredyt.';
    }
    if ($oprocentowanie == "") {
	$messages [] = 'Nie podano oprocentowania.';
    }

	
    if (count($messages) != 0) return false;

    if (! is_numeric($kwota)) {
	$messages [] = 'Podana kwota nie jest liczbą całkowitą.';
    }
    if (! is_numeric($lat)) {
	$messages [] = 'Podany okres, na jaki pobiera się kredyt nie jest liczbą całkowitą.';
    }
    if (! is_numeric($oprocentowanie)) {
	$messages [] = 'Podane oprocentowanie jest nieprawidłowe.';
    }

    if (count($messages) != 0) return false;
    else return true;
}

// 3. Wykonanie działania

function process(&$kwota,&$lat,&$oprocentowanie,&$messages,&$result){
    global $role;
    
    if (empty($messages)) {
	$kwota = intval($kwota);
	$lat = intval($lat);
	$oprocentowanie = intval($oprocentowanie);

        $result = ($kwota/($lat*12)) + (($kwota/($lat*12))*($oprocentowanie/100));
        $result = intval($result);

    }
}

//definicja zmiennych kontrolera
$kwota = null;
$lat = null;
$oprocentowanie = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$lat,$oprocentowanie);
if ( validate($kwota,$lat,$oprocentowanie,$messages) ) { // gdy brak błędów
	process($kwota,$lat,$oprocentowanie,$messages,$result);
}

include 'calc_kred_view.php';