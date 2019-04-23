<?php
session_start();

// Usefull files
require_once './res/config.php';

// Router
$url = explode('/', $_GET['url']);

switch ($url[0]) {
	case 'mon-compte':
	case 'inscription':
		$title = 'PCDUO.FR | Inscription';
		ob_start();
		require_once './webroot/model/inscriptionModel.php';
		require_once './webroot/view/inscription.php';
		$content = ob_get_clean();
		break;
	
	case 'contact':
		$title = 'PCDUO.FR | Contact';
		ob_start();
		require_once './webroot/view/contact.php';
		$content = ob_get_clean();
		break;
	
	case 'produit':
		if (isset($url[1])) {
			$title = 'PCDUO.FR | Produit';
			ob_start();
			require_once './webroot/model/produitModel.php';
			require_once './webroot/view/produit.php';
			$content = ob_get_clean();
		} else {
			$title = 'PCDUO.FR';
			ob_start();
			require_once './webroot/model/accueilModel.php';
			require_once './webroot/view/accueil.php';
			$content = ob_get_clean();
		}
		break;
	
	// Administration
	
	case 'administration':
		$title = 'PCDUO.FR | Administration';
		require_once './webroot/admin/index.php';
		$content = ob_get_clean();
		break;
	
	case 'ajout-produit':
		$title = 'PCDUO.FR | Ajout de produit';
		ob_start();
		require_once './webroot/model/ajoutProduitModel.php';
		require_once './webroot/view/ajoutProduit.php';
		$content = ob_get_clean();
		break;

	default:
		$title = 'PCDUO.FR';
		ob_start();
		require_once './webroot/model/accueilModel.php';
		require_once './webroot/view/accueil.php';
		$content = ob_get_clean();
		break;
}

require_once './webroot/view/header.php';
echo $content;
require_once './webroot/view/footer.php';
?>
