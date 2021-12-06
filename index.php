<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name=”keywords” content=”buddyzm, budda, Nichiren” />
  <title>Buddyzm Nichirena blog</title>
  <link href="style.css" rel="stylesheet" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CNMSE60N61"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CNMSE60N61');
</script>
</head>
<?php
  include 'artykul.php';
  ?>
  
<?php
  include 'header.php';
  ?>

<body>
<div class="row">
  <div class="leftcolumn">

    <?php 


if (isset($_GET['str']) && is_numeric($_GET['str']) ){
	for ($i =($_GET['str'] - 1) * $articlesPerPage; $i< $_GET['str'] * $articlesPerPage && $i < count($articles); $i++)
	{
		$articles[$i]->show_article();
		if (isset($_POST["submit".$i])) {

			formularz($_POST["nick".$i], $_POST["email".$i], $_POST["comment".$i], $i);
			
			if ($_POST["captche".$i] != $_POST["odp".$i]){
				echo "<p style=\"color:red\">Jesteś robotem!</p>";
				continue;
			}
			
			if (empty($_POST["email".$i]) || empty($_POST["nick".$i])

				|| empty($_POST["comment".$i])) {

			  echo "<p style=\"color:red\">Musisz wypełnić wszystkie pola!</p>";
			} 
			else if (!preg_match( "/^.+@.+\\..+$/ " , $_POST["email".$i] )){
				echo "<br /> <p style=\"color:red\">Niepoprawny email!</p>";
			} 
			else {
			  echo "<p>Dziękujemy za wysłanie komentarza!</p>";
			}

		}
		else {
			// Jeśli strona ładowana pierwszy raz, wyświetlamy pusty formularz
			formularz("","", "", $i);
		}
	}
}
else {
	for ($i = 0; $i< $articlesPerPage && $i < count($articles); $i++){
		
		$articles[$i]->show_article();
		  
		if (isset($_POST["submit".$i])) {

			formularz($_POST["nick".$i], $_POST["email".$i], $_POST["comment".$i], $i);

			if ($_POST["captche".$i] != $_POST["odp".$i]){
				echo "<p style=\"color:red\">Jesteś robotem!</p>";
				continue;
			}
			
			if (empty($_POST["email".$i]) || empty($_POST["nick".$i])

				|| empty($_POST["comment".$i])) {

			  echo "<p style=\"color:red\">Musisz wypełnić wszystkie pola!</p>";
			} 
			else if (!preg_match( "/^.+@.+\\..+$/ " , $_POST["email".$i] )){
				echo "<br /> <p style=\"color:red\">Niepoprawny email!</p>";
			} 
			else {
			  echo "<p>Dziękujemy za wysłanie komentarza!</p>";
			}

		}
		else {
			// Jeśli strona ładowana pierwszy raz, wyświetlamy pusty formularz
			formularz("","", "", $i);
		}
		
	}
}


?>


  </div>
  


<?php
  include 'right_column.php';
  ?>

<?php
  include 'footer.php';
  ?>
  
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
