<?php

/**
 * Модель для работы с вакансиями
 * Модель Jobs
 */
class Jobs
{

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
}