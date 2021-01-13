<?php

namespace Tests\Feature;

use App\Actions\DecrementCoffeeAction;
use App\Actions\DecrementOptionAction;
use App\Models\Options;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OptionsTest extends TestCase
{
    public function test_coffee_cannot_decrement_below_zero()
    {
        $option = Options::create(['name' => 'Sugar', 'qty' => 1]);

        // Run the decrement by.
        (new DecrementOptionAction())->execute($option->id, 3);

        $this->assertEquals(0, $option->refresh()->qty);
    }
}
