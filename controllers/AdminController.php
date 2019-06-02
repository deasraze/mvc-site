<?php

/**
 * Контроллер AdminController
 */
class AdminController extends AdminBase
{

    /**
     * Action для главной страницы админ панели
     * @return bool
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Подключаем вид
        require_once (ROOT . '/views/admin/index.php');
        return true;
    }
}