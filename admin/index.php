<?php

require_once 'config.php';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

require_once 'functions.php';
require_once 'router.php';

mysqli_close($db);