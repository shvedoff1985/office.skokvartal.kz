<?

//Класс роутинга

namespace engine\core;

use engine\core\View;

class Router {

	protected $routes = [];
	protected $params = [];

	function __construct() { // Выполняется при вызоыве new Router 
		$arr = require 'engine/config/routes.php';
		foreach ($arr as $key => $val) {
			$this->add($key, $val); // Добавление роутов в массив
		}
	}

	public function add($route, $params) { // Добавление маршрута
		$route = '#^'.$route.'$#'; // route теперь регулярное выражение
		$this->routes[$route] = $params;
	}

	public function match() { // Проверка маршрута
		$url = trim($_SERVER['REQUEST_URI'], '/');
		foreach ($this->routes as $route => $params) {
			if(preg_match($route, $url, $matches))  {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run() { // Запуск роутера
		if ($this->match()) {
			$path = 'app\controllers\\'.ucfirst($this->params['controller'].'Controller');
			if (class_exists($path)) {
				$action = $this->params['action'].'Action';

				if (method_exists($path, $action)) {
					$controller = new $path($this->params);
					$controller->$action();
				}else{
					View::errorCode(404);
				}
			}else{
				View::errorCode(404);
			}
		}else {
			View::errorCode(404);
		}
	}
}

?>