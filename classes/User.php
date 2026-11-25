<?php

class User
{

    ### Create user variables and store data using getUser method 
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $isActive;
    public $roleId;
    public $createdAt;
    public $updatedAt;

    ### Create new User

    public static function createUser($db, $firstName, $lastName, $email, $passowrd, $isActive, $roleId)
    {
        return $db->query(
            'INSERT INTO users (first_name, last_name, email_address, password, is_active, role_id) VALUES (:firstName, :lastName, :email, :password, :isActive, :roleId)',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => $passowrd,
                'isActive' => $isActive,
                'roleId' => $roleId
            ]
        );
    }

    ### Check if user exists in the database
    public static function loginAttempt($db, $email_address, $passowrd)
    {

        return $db->query('SELECT * FROM users WHERE email_address = :email AND password = :password',  [
            'email' => $email_address,
            'password' => $passowrd
        ])->find();
    }

    public function getUser($db, $userId)
    {

        if (! isset($userId)) {
            return;
        }



        $user = $db->query('SELECT * FROM users WHERE id = :userId',  [
            'userId' => $userId
        ])->find();

        if (! $user) {

            return;
        }

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


    public static function editProfile($db, $firstName, $lastName, $email, $roleId, $userId)
    {
        #check if user is administrator
        if ($roleId == 1) {
            return $db->query('UPDATE users SET first_name = :firstName, last_name = :lastName, email_address = :email, role_id = :roleId WHERE id = :userId', [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'roleId' => $roleId,
                'userId' => $userId
            ]);
        } else {
            return $db->query('UPDATE users SET first_name = :firstName, last_name = :lastName WHERE id = :userId', [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'userId' => $userId
            ]);
        }
    }

    public static function editPassword($db, $password, $userId)
    {

        return $db->query('UPDATE users SET password = :password WHERE id = :userId', [
            'password' => $password,
            'userId' => $userId
        ]);
    }


    public function getAllUsers($db)
    {
        $users = $db->query('SELECT * from users')->get();

        return $users;
    }

    public function getAllActiveUsers($db, $isActive)
    {
        $users = $db->query('SELECT * from users WHERE is_active = :isActive', [
            'isActive' => $isActive
        ])->get();

        return $users;
    }

    public static function countUsers($users, $isActive = 'all')
    {

        $usersCount = 0;

        foreach ($users as $user) {

            if ($isActive == 'all') {

                $usersCount++;
            } elseif ($user['is_active'] === $isActive) {

                $usersCount++;
            }
        }


        return $usersCount;
    }

    public static function filterUsers($db, $params)
    {

        $sql = "SELECT * from `users` WHERE 1=1";

        if (isset($params['is_active']) && $params['is_active'] !== 'all' && $params['is_active'] !== '') {

            $sql = $sql . " " . "AND is_active = :is_active";
            $params['is_active'] = (int) $params['is_active'];
        } else {

            unset($params['is_active']);
        }

        if (!empty($params['q'])) {

            $sql = $sql . " " . "AND (first_name LIKE :q OR email_address LIKE :q)";
            $q = trim($params['q']);
            $params['q'] = "%{$q}%";
        } else {
            unset($params['q']);
        }

        if (isset($params['role_id']) && !($params['role_id'] == 'all')) {

            $sql = $sql . " " . "AND role_id = :role_id";
            $roleId = trim($params['role_id']);
            $params['role_id'] = $roleId;
        } else {

            unset($params['role_id']);
        }

        $users = $db->query($sql, $params);

        return $users;
    }
}
