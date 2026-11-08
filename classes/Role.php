<?php

class Role
{
    public $roles;

    public $roleId;
    public $roleName;


    ### On initalization of Role class get all roles
    public function allRoles($db)
    {
        $this->roles = $db->querry('SELECT * from `role`')->get();

        return $this->roles;
    }

    ### Store each value into variables

    public function sortRoles($roles)
    {

        foreach ($roles as $role) {
            $this->roleId = $role['id'];
            $this->roleName = $role['role_name'];
        }
    }
}
