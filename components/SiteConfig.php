<?php

/**
 * Компонент для работы с настройками сайта
 * Компонент SiteConfig
 */

class SiteConfig
{

    /**
     * Возвращаем настройки сайта
     * @return mixed
     */
    public static function getSiteSettings()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT * FROM site_config');

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Извлекаем и возвращаем
        return $result->fetch();
    }

    /**
     * Метод обновления настроек сайта
     * @param $options
     * @return bool
     */
    public static function updateSiteSettings($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'UPDATE site_config
                  SET
                    site_title = :site_title, 
                    site_description = :site_description, 
                    admin_email = :admin_email, 
                    collection_count = :collection_count, 
                    news_count = :news_count, 
                    tickets_count = :tickets_count';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':site_title', $options['site_title'], PDO::PARAM_STR);
        $result->bindParam(':site_description', $options['site_description'], PDO::PARAM_STR);
        $result->bindParam(':admin_email', $options['admin_email'], PDO::PARAM_STR);
        $result->bindParam(':collection_count', $options['collection_count'], PDO::PARAM_INT);
        $result->bindParam(':news_count', $options['news_count'], PDO::PARAM_INT);
        $result->bindParam(':tickets_count', $options['tickets_count'], PDO::PARAM_INT);

        // Выполняем и возвращаем
        return $result->execute();
    }
}