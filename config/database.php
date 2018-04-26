<?php

/**
 * Database Configuration:
 * That Project is using PDO extesion to stablish a database connection
 * @var [type]
 */

$LIB_XX_CONFIG_DB = NULL;

if(file_exists('config/config.ini')) {

    $ini_array = parse_ini_file("config.ini", true);

    $LIB_XX_CONFIG_DB  = [
        "mysql_dev" => [
            "default" => true,
            "DRIVER" => "mysql",
            "HOST" => $ini_array['local']['host'],
            "DBNAME" => $ini_array['local']['db_name'],
            "USER" => $ini_array['local']['username'],
            "PASSWORD" => $ini_array['local']['password']
        ],
        "mysql_prod" => [
            "DRIVER" => "mysql",
            "HOST" => "",
            "DBNAME" => "",
            "USER" => "",
            "PASSWORD" => ""
        ],
        "pgsql_prod" => [
            "DRIVER" => "pgsql",
            "HOST" => "",
            "DBNAME" => "",
            "USER" => "",
            "PASSWORD" => ""
        ],
    ];
}

/**
 * Keeps the database configuration at a session avoiding to open this file more than once
 */
$_SESSION['LIB_XX_CONFIG_DB'] = $LIB_XX_CONFIG_DB;