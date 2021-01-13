<?php


namespace App\Actions;


use App\Models\Coffee;

class ProcessCoffeeAction
{
    public function execute($request)
    {
        $coffee = Coffee::findOrFail($request['coffee']);

        (new DecrementCoffeeAction())->execute($coffee);

        if (isset($request['options'])) {
            foreach ($request['options'] as $index => $quantity) {
                (new DecrementOptionAction())->execute($index, $quantity);
            }
        }
    }

}
