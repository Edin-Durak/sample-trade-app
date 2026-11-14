<?php

class Parameter
{

    ### Parametar variables

    public $id;
    public $name;
    public $shortCode;
    public $description;
    public $measurementUnit;
    public $active;
    public $minimum;
    public $maximum;
    public $createdAt;
    public $updatedAt;


    ### Create new parameter
    public static function createParameter($db, $name, $shortCode, $description, $measurementUnit, $active, $minimum, $maximum)
    {

        return $db->querry('INSERT INTO parameters (name, short_code, description, measurement_unit, active, minimum, maximum) VALUES( :name, :shortCode, :description, :measurementUnit, :active, :minimum, :maximum)', [
            'name' => $name,
            'shortCode' => $shortCode,
            'description' => $description,
            'measurementUnit' => $measurementUnit,
            'active' => $active,
            'minimum' => $minimum,
            'maximum' => $maximum
        ]);
    }

    ### Fetch all parameters

    public function getAllarameters($db)
    {
        $parameters = $db->querry('SELECT * from parameters')->get();

        return $parameters;
    }

    ### Fetch one parameter

    public function getParameter($db, $id)
    {
        ### Since we only search for one type of argument, we can inline variable like this
        $parameter = $db->querry("SELECT * from parameters WHERE id = {$id}")->findOrFail();

        $this->id = $parameter['id'];
        $this->name = $parameter['name'];
        $this->shortCode = $parameter['short_code'];
        $this->description = $parameter['description'];
        $this->measurementUnit = $parameter['measurement_unit'];
        $this->active = $parameter['active'];
        $this->minimum = $parameter['minimum'];
        $this->maximum = $parameter['maximum'];
        $this->createdAt = $parameter['created_at'];
        $this->updatedAt = $parameter['updated_at'];
    }
}
