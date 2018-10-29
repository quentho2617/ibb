<?php


require('controller/frontend.php');
try{
	
	$pages = scandir('view/frontend/');
	
	if (isset($_GET['page'])) {
		/* page home */
		if ($_GET['page'] == 'home') {
			$home = new PageHome;
			$home -> home();

		}
	
			elseif ($_GET['page'] == 'menu') {
				$menu = new PageMenu;
				$menu -> menu();
			}
			elseif ($_GET['page'] == 'operation') {
				$operation = new PageOperation;
				$operation -> operation();
			}
			elseif ($_GET['page'] == 'promo') {
				$promo = new PagePromo;
				$promo -> promo();
			}
			elseif ($_GET['page'] == 'article') {
				$article = new PageArticle;
				$article -> article();
			}
			elseif ($_GET['page'] == 'recap') {
				$recap = new PageRecap;
				$recap -> recap();
			}
			elseif ($_GET['page'] == 'commande') {
				$commande = new PageCommande;
				$commande -> commande();
			}
			elseif ($_GET['page'] == 'reservation') {
				$reservation = new PageReservation;
				$reservation -> reservation();
			}
			elseif ($_GET['page'] == 'prevision') {
				$prevision = new PagePrevision;
				$prevision -> prevision();
			}
			elseif ($_GET['page'] == 'term0') {
				$client = isset($_GET['term0']) ? $_GET['term0'] : NULL;
				$client = new PageOperation;
				$client -> jsonStat0($_GET['term0'] );
			}
		/* search page exist */
		elseif(in_array($_GET['page'],$pages)){
			$page=$_GET['page'];
		}
		else{
			throw new Exception('Ce n\' est pas la bonne page');			
		}
	}
	else{
		$home = new PageHome;
		$home -> home();
	}
	
}
catch(Exception $e) {
	
	require('view/frontend/error.php');
	
}
?>







