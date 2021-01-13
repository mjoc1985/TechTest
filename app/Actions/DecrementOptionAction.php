<?php


namespace App\Actions;


use App\Models\Options;
use PhpOption\Option;

class DecrementOptionAction
{
    public function execute($id, $quantity)
    {
        $option = Options::findOrFail($id);

        for ($i = 1; $i <= $quantity; $i++) {
            $option->consume();
        }

        $option->save();
    }
}
