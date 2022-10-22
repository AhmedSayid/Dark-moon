<?php

namespace App\Constants;

final class UserTypes
{
    const ADMIN = 1;
    const CLIENT  = 2;


    public static function getList()
    {
        return [
            UserTypes::ADMIN => __("message.admin"),
            UserTypes::CLIENT => __("message.editor"),
        ];
    }

    public static function getTypesUrl()
    {
        return [
            UserTypes::ADMIN => "admin",
            UserTypes::CLIENT => "editor",
        ];
    }

    public static function getOne($index = '')
    {
        $list = self::getList();
        $list_one = array_key_exists($index, $list) ?   $list[$index] : '';
        return $list_one;
    }
}
