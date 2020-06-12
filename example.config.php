<?php
// Database config.
define("DB_HOST", "");
define("DB_NAME", "");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");





// Don't edit anything below
define("REDIDNT", true); // To avoid problems with including files that should not be included

$db = NEW PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_NAME, DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$db->query("SET NAMES 'utf8mb4'");
