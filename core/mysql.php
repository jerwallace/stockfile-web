<?php

/*
 * MySQL Connection script.
 * @author Jeremy Wallace
 * @org University of British Columbia
 * @date June 16, 2013
 */

try {
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $db->query("SET NAMES 'utf8'");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    //error_log();
    throw new Exception ("Problem connecting to database! ".$e->getMessage());
}