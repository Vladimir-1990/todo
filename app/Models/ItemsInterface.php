<?php

namespace App\Models;

interface ItemsInterface{

    /**
     * Get all items in the databas
     *
     * @return array
     */
    public function all($userId);

    /**
     * Get item by id
     *
     * @return array
     */
     public function get($id);

     /**
     * Create an item
     * @return bool
     */
     public function create($content);

     /**
      * Delete an item
      *
      * @return bool
      */
      public function delete($id);

      /**
       * Delete an item
       *
       * @return bool
       */
      public function markDone($id);

}
