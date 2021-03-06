<?php
    $databaseConnection = pg_connect(getenv("DATABASE_URL"));

    if (!$databaseConnection) {
        echo "Cannot connect to the database!";
        exit;
    }

    $result = pg_query($databaseConnection, "SELECT message FROM messages");
    if (!$result) {
        echo "An error occurred retrieving the message!.\n";
        exit;
    }

    $messagesArray = array();
    while ($row = pg_fetch_row($result)) {
        array_push($messagesArray, "" . $row[0]);
    }

    echo json_encode($messagesArray);
?>