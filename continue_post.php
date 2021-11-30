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


<?php
$_SESSION['title'] = $_POST["title"];
$_SESSION['text']  = $_POST["text"];

$bbcode = array("[b]", "[/b]", "[i]", "[/i]", "[u]", "[/u]");
$htmlcode   = array("<strong>", "</strong>", "<i>", "</i>", "<span style=\"text-decoration:underline;\">", "</span>");
	

  ?>

<body>
<div class="row">
  <div class="leftcolumn">
  <h1> <?=$_SESSION['title']?> </h1>
	<p><?=nl2br(trim(str_replace($bbcode, $htmlcode, $_SESSION['text'])))?></p>
  
  
<a href="new_post.php">
   <button>Powrót</button>
</a>
<a href="template.php">
   <button>Wyślij</button>
</a>

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