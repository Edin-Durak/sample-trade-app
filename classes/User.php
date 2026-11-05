<?php

class User
{

    ### Create user variables and store data using setUserVariables 
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $isActive;
    public $roleId;
    public $createdAt;
    public $updatedAt;

    ### Check if user exists in the database
    public static function loginAttempt($db, $email_address, $passowrd)
    {

        return $db->querry('SELECT * FROM users WHERE email_address = :email AND password = :password',  [
            'email' => $email_address,
            'password' => $passowrd
        ])->find();
    }

    public function getUser($db, $userId)
    {

        $user = $db->querry('SELECT * FROM users WHERE id = :userId',  [
            'userId' => $userId
        ])->find();

        if (isset($userId)) {

            $this->id = $user['id'];
            $this->firstName = $user['first_name'];
            $this->lastName = $user['last_name'];
            $this->email = $user['email_address'];
            $this->password = $user['password'];
            $this->isActive = $user['is_active'];
            $this->roleId = $user['role_id'];
            $this->createdAt = $user['created_at'];
            $this->updatedAt = $user['updated_at'];
        }
    }
}
