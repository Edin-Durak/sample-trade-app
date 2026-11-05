<?php

class User
{

    ### Check if user exists in the database
    public static function loginAttempt($db, $email_address, $passowrd)
    {

        return $db->querry('SELECT * FROM users WHERE email_address = :email AND password = :password',  [
            'email' => $email_address,
            'password' => $passowrd
        ])->find();
    }
}
