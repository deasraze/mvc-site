<?php

/**
 * Модель для работы с вакансиями
 * Модель Jobs
 */

class Jobs
{

    /**
     * Возвращаем информацию о конкретном билете
     * @param $id
     * @return mixed
     */
    public static function getJobsById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT * FROM jobs WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем
        $result->execute();

        // Извлекаем и возвращаем
        return $result->fetch();
    }

    /**
     * Возвращаем список вакансий
     * @return array
     */
    public static function getJobsList()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT id, name, what_to_do, requirements FROM jobs WHERE status="1"');

        $jobsList = array();
        $i = 0;
        // Извлекаем данные в виде массива и возвращаем
        while ($row = $result->fetch()) {
            $jobsList[$i]['id'] = $row['id'];
            $jobsList[$i]['name'] = $row['name'];
            $jobsList[$i]['what_to_do'] = $row['what_to_do'];
            $jobsList[$i]['requirements'] = $row['requirements'];
            $i ++;
        }
        return $jobsList;
    }

    /**
     * Метод добавления новой вакансии
     * @param $options
     * @return bool
     */
    public static function createJobs($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'INSERT INTO jobs (name, what_to_do, requirements, status) 
                VALUES (:name, :what_to_do, :requirements, :status)';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':what_to_do', $options['what_to_do'], PDO::PARAM_STR);
        $result->bindParam(':requirements', $options['requirements'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        // Выполняем
        return $result->execute();
    }

    /**
     * Метод редактирования вакансии
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateJobs($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'UPDATE jobs
                SET
                    name = :name, 
                    what_to_do = :what_to_do, 
                    requirements = :requirements, 
                    status = :status 
                WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':what_to_do', $options['what_to_do'], PDO::PARAM_STR);
        $result->bindParam(':requirements', $options['requirements'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        // Выполняем
        return $result->execute();
    }

    /**
     * Метод удаления вакансии
     * @param $id
     * @return bool
     */
    public static function deleteJobs($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM jobs WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Выполняем
        return $result->execute();
    }

    /**
     * Возвращаем список вакансий для админ панели
     * @return array
     */
    public static function getJobsListAdminPanel()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT id, name, status FROM jobs ORDER BY id DESC');

        $jobsList = array();
        $i = 0;
        // Извлекаем данные в виде массива
        while ($row = $result->fetch()) {
            $jobsList[$i]['id'] = $row['id'];
            $jobsList[$i]['name'] = $row['name'];
            $jobsList[$i]['status'] = $row['status'];
            $i ++;
        }

        // Возвращаем
        return $jobsList;
    }

    /**
     * Поиск вакансий в админ панели
     * @param $query
     */
    public static function searchJobInAdminPanel($query)
    {
        $db = Db::getConnection();

        // Испольуем подготовленный запрос
        $sql = "SELECT * FROM jobs WHERE name LIKE :query limit 5";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindValue(':query', "%{$query}%", PDO::PARAM_STR);
        // Выполняем
        $result->execute();


        if ($result->rowCount() > 0) {
            $output = "<div class=table-responsive>
					<table class=table table bordered>";

            while ($row = $result->fetch()) {
                $output .= '<tr><td><a href="/admin/jobs/update/' . $row['id'] . '">' . $row['name'] . '</a></td></tr>';
            }
            echo $output;
        }
    }

    /**
     * Возвращаем текстовое пояснение статусу
     * @param $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыто';
                break;
        }
    }
}