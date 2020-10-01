<?
/**
 * 
 */

namespace app\controllers;

use engine\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		echo "Главная страница";
	}

	public function contactAction() {
		echo "Контакты";
	}

}
?>