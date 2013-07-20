<?php

/*
 * This file looks up an director based on a query and returns a JSON object.
 * TODO: Harden this file.. it is exposed and is a security threat.
 * @author Jeremy Wallace
 * @org University of British Columbia
 * @date June 16, 2013
 */

require_once "../config.inc";
require_once "../mysql.php";
require_once "../controllers/search.controller.php";

$searchController = new SearchController();

$rows = $searchController->searchDirectors($_GET['q'], true);

print json_encode($rows);
?>
