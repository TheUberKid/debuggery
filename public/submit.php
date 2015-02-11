<?php

	require("../includes/config.php");
    if(array_key_exists("id", $_SESSION)){
        $username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        $user = $username[0];
    } else {
        $user[] = [];
        render("logfail.php", ["title" => "Action Needed", "user" => $user ]);
        exit();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

    	if( empty($_POST["title"]) || empty($_POST["desc"]) ){
            header("Location: /public/submit.php");
            exit();
        } else if( strlen($_POST["title"]) > 100 ){
            header("Location: /public/submit.php");
            exit();
        } else {
            $data[] = [
                "title" => $_POST["title"],
                "desc" => $_POST["desc"]
            ];
            $tags = query("SELECT * FROM taglist");
            render("continue.php", ["title" => "Submit | Debuggery", "user" => $user, "data" => $data, "tags" => $tags]);
        }

    } else {
    	render("submitform.php", ["title" => "Submit | Debuggery", "user" => $user ]);
    }

?>
