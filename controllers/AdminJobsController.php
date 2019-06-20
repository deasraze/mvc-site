<?php

/**
 * Контроллер для управления вакансиями в админке
 * Контроллер AdminJobsController
 */

class AdminJobsController extends AdminBase
{

    /**
     * Страница с вакансиями
     * @return bool
     */
    public function actionIndex()
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем массив с вакансиями
            $jobsList = array();
            $jobsList = Jobs::getJobsListAdminPanel();

            // Подключаем вид
            require_once (ROOT . '/views/admin_jobs/index.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Страница добавления новой вакансии
     * @return bool
     */
    public function actionCreate()
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id для авы
            $idUser = User::checkLoggedAdminPanel();

            // Очищаем поля
            $options['name'] = '';
            $options['what_to_do'] = '';
            $options['requirements'] =  '';

            if (isset($_POST['submit'])) {
                // Если форма была отправлена, считываем данные
                $options['name'] = $_POST['name'];
                $options['what_to_do'] = $_POST['what_to_do'];
                $options['requirements'] = $_POST['requirements'];
                $options['status'] = $_POST['status'];

                // Делаем валидацию
                $errors = false;

                if (!isset($options['name']) || empty($options['name']) ||
                    !isset($options['what_to_do']) || empty($options['what_to_do']) ||
                    !isset($options['requirements']) || empty($options['requirements'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет, то добавляем вакансию
                    Jobs::createJobs($options);

                    // Перенаправляем
                    header("Location: /admin/jobs/");
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_jobs/create.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Страница редактирования вакансии
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем информацию о редактируемой вакансии
            $job = Jobs::getJobsById($id);

            if (isset($_POST['submit'])) {
                // Если форма была отправлена, то считываем данные
                $options['name'] = $_POST['name'];
                $options['what_to_do'] = $_POST['what_to_do'];
                $options['requirements'] = $_POST['requirements'];
                $options['status'] = $_POST['status'];

                // Делаем валидацию
                $errors = false;

                if (!isset($options['name']) || empty($options['name']) ||
                    !isset($options['what_to_do']) || empty($options['what_to_do']) ||
                    !isset($options['requirements']) || empty($options['requirements'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет, то сохраняем изменения
                    Jobs::updateJobs($id, $options);

                    // Перенаправляем
                    header("Location: /admin/jobs/");
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_jobs/update.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Удаление выбранной вакансии
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Удаляем
            Jobs::deleteJobs($id);
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

}