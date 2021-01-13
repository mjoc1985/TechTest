<?php


namespace App\Actions;


use App\Models\Coffee;

class DecrementCoffeeAction
{
    public function execute(Coffee $coffee)
    {
        if ($coffee->isAvailable()) {
            $coffee->consume();
            $coffee->save();
        }
    }
}
