<?php

/**
 * Контроллер для управления вакансиями
 * Контроллер JobsController
 */

class JobsController
{

    /**
     * Страница с вакансиями
     * @return bool
     */
    public function actionIndex()
    {
        // Получаем массив с вакансиями
        $jobsList = array();
        $jobsList = Jobs::getJobsList();

        // Получаем id пользователя для авы
        $idUser = User::getUserId();


        if (isset($_POST['submit'])) {
            // Если форма была отправлена, считываем данные
            $vacancy_to_job = $_POST['vacancy-to-job'];
            $fio = $_POST['FIO'];
            $citizenship = $_POST['citizenship'];
            $date = $_POST['date'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $timeToCall = $_POST['time_to_call'];
            $email = $_POST['email'];
            $education = $_POST['education'];
            $specialty = $_POST['specialty'];
            $years_of_education = $_POST['years_of_education'];
            $labor_activity = $_POST['labor_activity'];
            $personal_qualities = $_POST['personal_qualities'];
            $start_date = $_POST['start_date'];

            // Отправляемь письмо на почту администратора
            $to = SiteConfig::getSiteSettings();
            $subject = 'Откликнулись на вакансию ' . mb_strtolower($vacancy_to_job);
            $message =
                'ФИО: ' . $fio . PHP_EOL .
                'Гражданство: ' . $citizenship . PHP_EOL .
                'Дата рождения: ' . $date . PHP_EOL .
                'Адрес проживания: ' . $address . PHP_EOL .
                'Телефон: ' . $phone . PHP_EOL .
                'Удобное время для звонка: ' . $timeToCall . PHP_EOL .
                'E-mail: ' . $email . PHP_EOL .
                'Образование: ' . $education . PHP_EOL .
                'Специальность: ' . $specialty . PHP_EOL .
                'Годы обучения в ВУЗе: ' . $years_of_education . PHP_EOL .
                'Трудовая деятельность: ' . $labor_activity . PHP_EOL .
                'Личные качества: ' . $personal_qualities . PHP_EOL .
                'Возможность приступить к работе с: ' . $start_date . PHP_EOL;

            mail($to['admin_email'], $subject, $message);
        }

        // Подключаем вид
        require_once (ROOT . '/views/jobs/index.php');
        return true;
    }
}