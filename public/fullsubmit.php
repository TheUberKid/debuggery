<?php

	require("../includes/config.php");
	if(array_key_exists("id", $_SESSION)){
        $username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        $user = $username[0];
    } else {
        $user[] = [];
    }

	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		if(empty($_POST["title"]) || empty($_POST["desc"])){
			alert("No title or desc!");
			exit();
		} else if(empty($_POST["code"][0])){
            $tags = query("SELECT * FROM taglist");
            header("Location: /public/submit.php");
            exit();
		} else {
			$result = query("INSERT INTO questions (uid, title, description, time) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["title"], $_POST["desc"], time());
			if($result === FALSE){
				header("Location: /public/error.php");
				exit();
			} else {
				$qsid = query("SELECT qid FROM questions WHERE title = ?", $_POST["title"]);
				if(!array_key_exists(0, $qsid) ){
					header("Location: /public/error.php");
					exit();
				}

				$count = 0;
				$bool = FALSE;
				while($bool === FALSE){
					if(array_key_exists($count, $_POST["code"])){ 
						$count++;
					} else {
						$bool = true;
					}
				}

				for ($i=0; $i < $count; $i++) { 
					echo $_POST["tag"][$i];
					$ctags = query("SELECT tid FROM taglist WHERE tagname = ?", $_POST["tag"][$i]);
					if(array_key_exists(0, $ctags)){
						query("INSERT INTO code (qid, code, tid) VALUES(?,?,?)", $qsid[0]["qid"], $_POST["code"][$i], $ctags[0]["tid"]);
					} else {
						header("Location: /public/error.php");
						exit();
					}
				}
				header("Location: /public/view.php?qid=" . $qsid[0]["qid"]);
			}
		}

	} else {
		header("Location: /public/submit.php");
	}

?>

