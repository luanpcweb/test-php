<?php

try {

    $host = getenv('HOST');
    $database = getenv('DATABASE');
    $username = getenv('USERNAME');
    $password = getenv('PASSWORD');

    $conn = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conn->query("SELECT * FROM customer_entity LIMIT 10");

    foreach ($query->fetchAll() as $value) {
        echo "[ID " .$value['entity_id']. "] -> ".$value['email']." <br>";
    }

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

