<?php

if (!function_exists('createSalt')) {
    function createSalt()
    {
        $string = md5(uniqid(rand(), true));
        return substr($string, 0, 3);
    }
}

if (!function_exists('createPassword')) {
    function createPassword($password)
    {
        $salt = createSalt();
        $passwordHashed = bcrypt($password . $salt);
        return [
            "password" => $passwordHashed,
            "salt" => $salt
        ];
    }
}