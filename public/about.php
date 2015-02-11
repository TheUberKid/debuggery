<?php

    // configuration
    require("../includes/config.php");
    if(array_key_exists("id", $_SESSION)){
		$username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
    	$user = $username[0];
    } else {
    	$user[] = [];
    }

    render("aboutform.php", ["title" => "About Debuggery", "user" => $user ]);

?>
