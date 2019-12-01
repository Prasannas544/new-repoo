
<?php
    $user = 'root';
    $pass = '';
    $mySql_db = 'testdb';
    $mySql_db = new mysqli('localhost',$user,$pass,$mySql_db);
    if ($mySql_db->connect_error) {
        die("Connection failed: " . $mySql_db->connect_error);
    }
?>