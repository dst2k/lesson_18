<?php

$page = $_GET['page'] ?? 'home';
$pages = array_slice(scandir(PATH_PAGES), 2);
$pages = array_map(function($elem) {
	return substr($elem, 0, -4);
}, $pages);

if(!in_array($page, $pages))
	$page = '404';

include PATH_PAGES . $page . '.php';