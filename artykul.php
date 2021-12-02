<?php


class Article {
 
 public $title;
 public $description;
 public $date;
 public $short_text;
 public $full_text;
 public $image_path;

 function __construct( $title, $description, $date, $short_text, $full_text, $img_path ) {
     $this->title = $title;
     $this->description = $description;
     $this->date = $date;
     $this->short_text = $short_text;
     $this->full_text = $full_text;
     $this->image_path = $img_path;
 }
 
 public function show_article(){
	 echo("<div class=\"card\">
    <h2>" . $this->title ."</h2>
    <h5>". $this->description . "<br> <div style=\"text-align: center;\">Data posta: ".  $this->date->format('Y-m-d H:i:s') ."<div></h5>
    <div class=\"img\" style=\"height:200px;\">Image</div>
    <p>". $this->short_text ."</p>
  <a href=\"\">Czytaj więcej</a>
  </div> ");
 }
}

$articlesPerPage = 2;
$article1 = new Article("Początki buddyzmu", "Kiedy to się wszystko zaczęło?", new DateTime("now"), "Początki buddyzmu datuje się na około 500r. p.n.e., kiedy to indyjski książę Shakyamuni doznał oświecenia.", "Na razie brak", "");
$article2 = new Article("Chantowanie Nam-Myoho-Renge-Kyo", "Czym jest czantowanie?", new DateTime("now"), "Czantowanie to powtarzanie na głos rytmicznie pewnej frazy. W Buddyźmie Nichirena tą frazą jest Nam-Myoho-Renge-Kyo, która uważana jest za prawo wszechświata.", "Na razie brak", "");
$article3 = new Article("Buddyzm w Polsce", "Ile osób w polsce?", new DateTime("now"), "W polsce buddyzm rozwija się bardzo dynamicznie.", "Na razie brak", "");


$articles = array($article1, $article2, $article3);

// Funkcja wyświetlająca formularz


function formularz($nick = "", $email = "", $comment = "", $key= "") {

    ?>

    <form name="form<?= $key; ?>" class="card" action="" method="post" onsubmit="return submitForm(<?= $key; ?>)" >
    Nick:<br />
    <input name="nick<?= $key; ?>" value="<?= $nick; ?>" /><br />
    Email:<br />
    <input name="email<?= $key; ?>" value="<?= $email; ?>" /><br />
    Komentarz:<br />
    <textarea name="comment<?= $key; ?>" value="" cols="50" rows="5"><?= $comment; ?></textarea><br />
	<?php
	$numbers = array("zero", "jeden", "dwa", "trzy", "cztery", "pięć", "sześć", "siedem", "osiem", "dziewieć");
	$dzialanie = array("plus", "minus", "razy", "podzielone przez");
	$odp = 0;
	do{
		$liczba1 = rand(0, 9);
		$liczba2 = rand(0, 9);
		$dzialanieLiczba = rand(0, 3);
		switch ($dzialanieLiczba){
			case 0:
				$odp = $liczba1 + $liczba2;
				break;
			case 1:
				$odp = $liczba1 - $liczba2;
				break;
			case 2:
				$odp = $liczba1 * $liczba2;
				break;
			case 3:
				if ($liczba2 == 0){
					$odp = 11;
				} 
				$odp = $liczba1 / $liczba2;
				break;
			
		}
	} while($odp<0 || $odp>10 || !(is_int($odp)) );
	
	echo($numbers[$liczba1] ." ". $dzialanie[$dzialanieLiczba] ." ". $numbers[$liczba2]. ": <br />"	);
	?>
	<input name="captche<?= $key; ?>" value="" /><br />
	<input type="hidden" name="odp<?= $key; ?>" value="<?= $numbers[$odp]; ?>">


	
    <input type="submit" value="Wyślij" name="submit<?= $key; ?>" /> </form>
	
    <?php

  }

	

?>

