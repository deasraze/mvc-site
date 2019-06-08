<?php

/**
 * Контроллер для управления вакансиями
 * Контроллер JobsController
 */

class JobsController
{

    public function actionIndex()
    {

        // Подключаем вид
        require_once (ROOT . '/views/jobs/index.php');
        return true;
    }
}