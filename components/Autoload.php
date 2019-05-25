<?php

// Автозагрузка классов, передает название класса
spl_autoload_register(function($class_name)
{
    // Указываем папки, где могут содержаться классы
    $array_paths = array(
        '/models/',
        '/components/'
    );

    // Проходим циклом по этим папкам и ищем нужный файл
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        // Если он сучещствует, то подключаем
        if (is_file($path)) {
            include_once $path;
        }
    }
});