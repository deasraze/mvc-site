<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Collection.php';

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestCollection = array();
        $latestCollection = Collection::getLatestCollection(6);
        
        require_once(ROOT.'/views/site/index.php');

        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            var_dump($userText, $userEmail);
            die;

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($userText == null ) {
                $errors[] = 'Введите сообщение';
            }

            if ($errors == false) {
                $adminEmail = 'museum@museum.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once (ROOT . '/views/site/contact.php');

        return true;
    }


    public function actionError()
    {
        echo '404 - не найдено';
        return true;
    }
}