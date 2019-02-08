<?php

namespace App\Models;

interface UserInterface{

    /**
     * Get all items in the databas
     *
     * @return object
     */
    public function getByEmail($email);

    /**
     * Get all items in the databas
     *
     * @return object
     */
    public function getByToken($apiToken);

    /**
     * Get all items in the databas
     *
     * @return bool
     */
    public function update($id, $data);

}
