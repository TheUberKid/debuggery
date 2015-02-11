<?php

	require("../includes/config.php");
    if(array_key_exists("id", $_SESSION)){
        $username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        $user = $username[0];
    } else {
        $user[] = [];
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // answer question
        if( !array_key_exists("id", $_SESSION) ){
            $user[] = [];
            render("logfail.php", ["title" => "Action Needed", "user" => $user ]);
            exit();
        }

        if( empty($_POST["sol"]) ){
            header("Location: /public/view.php?qid=" . $_POST["qsid"] );
            exit();
        }

        $qquery = query("INSERT INTO answers (uid, qid, time, content) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["qsid"], time(), $_POST["sol"] );
        if($qquery === FALSE){
            header("Location: /public/error.php");
            exit();
        }
        header("Location: /public/view.php?qid=" . $_POST["qsid"] );
        exit();

    } else {
        $qinfo = query("SELECT * FROM questions WHERE qid = " . $_GET["qid"] );
        if($qinfo === FALSE){
            header("Location: /public/error.php");
            exit();
        }
        $qcode = query("SELECT * FROM code WHERE qid = " . $_GET["qid"] );
        $quser = query("SELECT id, username FROM users WHERE id = " . $qinfo[0]["uid"] );
        $qsols = query("SELECT uid, content FROM answers WHERE qid = " . $_GET["qid"] );
    	render("viewform.php", ["title" => "Debug Questions", "user" => $user, "qinfo" => $qinfo, "qcode" => $qcode, "quser" => $quser, "qsols" => $qsols ]);
    }
