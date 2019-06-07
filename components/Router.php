<?php

/**
 * Компонент Router
 * Маршрутизация сайта
 */

class Router
{

    private $routers;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routers = include($routesPath);
    }


    /**
     * Метод возвращения строки запроса
     * @return string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) { // Если переменная не пуста
            return trim($_SERVER['REQUEST_URI'], '/'); // Функция trim удаляет '/'
                                                             // из начала и конца строки, по умолчанию удаляет пробелы
        }
    }

    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routes
        // Для каждого маршрута мы помещаем в $uriPattern строку запроса из роутов,
        // в переменную path путь (н.р. news/index)
        foreach ($this->routers as $uriPattern => $path) {

            // Сравниваем $uriPattern(данные в роутах) и $uri(строка запроса)
            // если регулярка совпадает с введенным адресом, продолжаем действие
            if (preg_match("~^$uriPattern$~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу в роутах,
                // выполняя поиск в полученной ссылке согласно паттерну и заменяем на $path
                $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);

                // Определить параметры, какой контроллер и action обрабатывают запрос
                // Возвращаем массив с именем контроллера и экшена, через функцию explode, используя разделитель '/'
                $segments = explode('/', $internalRoute);

                // Функция array_shift получает первое значение из массива, а затем удаляет его из массива
                $controllerName = array_shift($segments) . 'Controller';
                // Получаем имя контроллера, функция ucfirst делаяет первую букву строки заглавной
                $controllerName = ucfirst($controllerName);

                // Получаем имя экшена, аналогично вышеприведенному
                $actionName = 'action'.ucfirst(array_shift($segments));

                //В массиве  $segments остались параметры (значения), после прогона начального массива через функцию array_shift
                $parameters = $segments;


                // Подключить файл класса-контроллера
                $controllerFIle = ROOT . '/controllers/' . $controllerName . '.php';

                // Проверка есть ли такой файл на диске
                if (file_exists($controllerFIle)) {
                    include_once($controllerFIle);
                }

                // Создать объект, вызвать метотд (action)
                $controllerObject = new $controllerName;

                // Вызывает $actionName у $controllerObject и передает массив $parameters
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }
}