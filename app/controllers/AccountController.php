<?

namespace app\controllers;

use engine\core\Controller;

class AccountController extends Controller {

	public function loginAction() {
		$this->view->render('Вход');
	}

	public function registerAction() {
		$this->view->render('Регистрация');
	}
}
?>