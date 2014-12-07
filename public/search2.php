<?php

    require(__DIR__ . "/../includes/config.php");
    
    // ensure proper usage
    if (empty($_GET["faculty"]))
    {
        http_response_code(400);
        exit;
    }

    // escape user's input
    $fullname = urlencode($_GET["fullname"]);
    
    // numerically indexed array of places
    $faculty2 = [];
    
    // if not empty, check geo against database
    $faculty2 = query("SELECT * FROM faculty WHERE MATCH (fullname) AGAINST(?)", $fullname);
   
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($faculty2, JSON_PRETTY_PRINT));

?>
