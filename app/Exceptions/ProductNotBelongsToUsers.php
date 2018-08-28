<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUsers extends Exception
{
    public function render()
    {
        return ['errors' => 'Product not belongs to User!'];
    }

}
