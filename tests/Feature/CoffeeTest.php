<?php

namespace Tests\Feature;

use App\Actions\DecrementCoffeeAction;
use App\Models\Coffee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoffeeTest extends TestCase
{
    public function test_coffee_cannot_decrement_below_zero()
    {
        $coffee = Coffee::create(['name' => 'coffee', 'qty' => 1]);

        // Run the decrement action 3 times.
        (new DecrementCoffeeAction())->execute($coffee);
        (new DecrementCoffeeAction())->execute($coffee);
        (new DecrementCoffeeAction())->execute($coffee);

        $this->assertEquals(0, $coffee->refresh()->qty);
    }
}
