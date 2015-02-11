<?php

	require("../includes/config.php");
    if(array_key_exists("id", $_SESSION)){
        $username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        $user = $username[0];
    } else {
        $user[] = [];
    }

    $results = query("SELECT qid, uid, title, description FROM questions ORDER BY time DESC LIMIT 10");


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

    	header("Location: /public/search.php?src=" . urlencode($_POST["query"]) );

    } else {
    	render("browse.php", ["title" => "Debug Questions", "user" => $user, "results" => $results ]);
    }

?>
