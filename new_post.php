<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Buddyzm Nichirena blog</title>
  <link href="style.css" rel="stylesheet" />
</head>


  
<header class="page-header">
    <h1 style="text-align: center;">Buddyzm Nichirena Daishonina</h1>
</header>

<body>
<div class="row">
  <div class="leftcolumn">
<form id="newpost" class="card" action="continue_post.php" method="post">
<p>Tytuł:
<input name="title" value="<?php

    if (isset($_SESSION['title'])) {
        echo $_SESSION['title'];
    }
?>" size="70"></input> </br> </p>
Treść: </br>
<textarea name="text" rows="7" cols="100"><?php

    if (isset($_SESSION['text'])) {
        echo $_SESSION['text'];
    }
?></textarea> </br>
<input type="submit" value="Dalej" name="submit" />

</form>

  </div>


  <div class="rightcolumn">
    <div class="card">
      <h2>O buddyźmie</h2>
      <div class="img" style="height:100px;">Image</div>
      <p>Buddyzm powstał wtedy i wtedy wymyślony przez tego i tego człowieka</p>
    </div>
    <div class="card">
      <h3>Popularne Post</h3>
      <div class="img">Image</div><br>
      <div class="img">Image</div><br>
      <div class="img">Image</div>
    </div>
    <div class="card">
      <h3>Odnośniki do innych stron</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Cytat dnia</h2>
</div> 
  
  </div>
  
  

</div>




  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>
	
	function submitForm(i){
		var nick = document.forms["form"+i]["nick" + i].value;
		var email = document.forms["form"+i]["email" + i].value;
		var comment = document.forms["form"+i]["comment" + i].value;
		console.log(comment);
		var missing = ""
		if (nick == ""){
			missing += "\nnick"
		}
		const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		;
		if (email == "" || !re.test(String(email).toLowerCase())){
			missing += "\nemail"
		}
		if (comment == ""){
			missing += "\nkomentarz"
		}
		if (missing != ""){
			alert("Uzupełnij/popraw następujące pola:" + missing );
			return false;
		}
		return true;
	}
  </script>

</body>
</html>