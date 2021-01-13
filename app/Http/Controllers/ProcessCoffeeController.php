<?php

namespace App\Http\Controllers;

use App\Actions\ProcessCoffeeAction;
use App\Exceptions\ExceededStockException;
use App\Models\Coffee;
use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProcessCoffeeController extends Controller
{
    public function __invoke(Request $request, ProcessCoffeeAction $processCoffeeAction)
    {
        $request->validate([
            'coffee' => 'required'
        ]);

        if ($checkFailed = $this->checkStock($request)) {
            return Redirect::back()->withErrors($checkFailed);
        }

        $processCoffeeAction->execute($request->all());

        return Redirect::back()->with([
            'message' => 'Please enjoy your drink!'
        ]);
    }

    protected function checkStock($request)
    {
        $coffee = Coffee::findOrFail($request->coffee);

        if(! $coffee->isAvailable()) {
            return [
                $coffee->name => 'Out of stock.'
            ];
        }

        if (isset($request['options'])) {

            foreach ($request['options'] as $index => $qty) {
                $option = Options::findOrFail($index);

                if ($qty > $option->qty) {
                    return [
                        $option->name => 'Quantity exceeds remaining stock of ' . $option->qty
                    ];
                }
            }
        }
    }

}
