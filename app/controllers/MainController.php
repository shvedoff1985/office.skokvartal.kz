<?

namespace app\controllers;

use engine\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		/** $vars = [
			'name' => 'Вася',
			'age' => '88'
		]; **/ 
		$this->view->render('главная страница'/*, $vars*/);
	}
}

?>