<?php

/**
 * Файл чисто для сценария, не использовать вообще нигде!
 */

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require_once '__autoload.php';

$admin = new \user\Admin("Admin1");
$mentor = new \user\Mentor("Mentor1");