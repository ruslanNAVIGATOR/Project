<?php
namespace components;
use controllers\LoginController;
require ROOT. "/controllers/LoginController.php";


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        $uri = $this->getURI();
        echo $uri.'<br>';

        foreach ($this->routes as $uriInCnfg => $route) {

                //сравниваем содержимое слева routes.php со строкой
                if (preg_match("/$uriInCnfg/", "$uri")) {

                    //определяем какой экшен и контроллер
                    $arr = explode("/", $route);

                    $controllerName = array_shift($arr) . 'Controller';
                    $controllerName = ucfirst($controllerName);
                    $actionName = "action" . ucfirst(array_shift($arr));

                    //создаём объект и вызываем экшен в подключенном классе
                    $str = "controllers\\$controllerName";
                    echo $str;
                    echo "<br>class == $str action = $actionName<br>";
                    $controllerObj = new $str();

                    $result = $controllerObj->$actionName();
                    if ($result != null) {
                        break;
                    }
                }
            }
    }
}