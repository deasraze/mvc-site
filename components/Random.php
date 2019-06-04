<?php

/**
 * Компонент Random
 * Генерация пароля и логина для админ панели
 */

class Random
{

    /**
     * Вовзаращем рандомно сегенерированный логин для входа в админ панель
     * @param int $length длина
     * @return string
     */
    public static function generateLogin($length)
    {
        // Символы для генерации
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Получаем длину строки
        $count = mb_strlen($chars);

        // $result - промежуточная переменная
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1); // Генерируем случайное число, от 0 до $count - 1
            // Возвращаем часть строки, где $chars - исходная строка,
            // $index - возвращенный номер строки
            $result .= mb_substr($chars, $index, 1);
        }

        // Возвращаем сгенерированный логин
        return $result;
    }

    /**
     * Возвращаем рандомно сгенерированный пароль для входа в админ панель
     * @param int $length длина
     * @return string
     */
    public static function generatePassword($length)
    {
        // Символы для генерации
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?';
        // Получаем длину строки
        $count = mb_strlen($chars);

        // $result - промежуточная переменная
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1); // Генерируем случайное число, от 0 до $count - 1
            // Возвращаем часть строки, где $chars - исходная строка,
            // $index - возвращенный номер строки
            $result .= mb_substr($chars, $index, 1);
        }

        // Возвращаем сгенерированный пароль
        return $result;
    }
}