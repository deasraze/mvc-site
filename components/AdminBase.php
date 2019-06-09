<?php

/**
 * Абстракный класс, который содержит общую логику для всех остальных контроллеров админ панели
 */
abstract class AdminBase
{

    /**
     * Проверка прав администратора
     * @return bool
     */
    public static function checkAdmin()
    {
        // Проверяем, авторизирован ли юзер, если нет, то переадресовываем
        $userId = User::checkLoggedAdminPanel();

        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);

        // Если пользователь обладает правами доступа, то пускаем его в разделы
        if ($user['role'] == 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Проверка прав редактора
     * @return bool
     */
    public static function checkEditor()
    {
        // Проверяем, авторизирован ли юзер, если нет, то переадресовываем
        $userId = User::checkLoggedAdminPanel();

        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);

        // Если пользователь обладает правами доступа, то пускаем его в разделы
        if ($user['role'] == 'editor') {
            return true;
        }

        return false;
    }
}