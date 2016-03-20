<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'omss');

$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_error() );

@mysql_select_db (DB_NAME) OR die ('Could not select the database: ' .mysql_error() );

function escape_data ($data) {

    // Address Magic Quotes
    if (ini_get('magic_quotes_gpc')) {
        $data = stripslashes($data);
    }

    // Check for mysql_real_escape_string() support
    if (function_exists('mysql_real_escape_string')) {
        global $dbc ;	// Need the connection
        $data = mysql_real_escape_string (trim($data), $dbc);
    } else {
        $data = mysql_escape_string (trim($data));
    }

    // Return the esacaped value
    return $data;
}
?>
