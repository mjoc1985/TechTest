<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isAvailable()
    {
        return $this->qty > 0;
    }

    public function consume()
    {
        $this->qty--;
    }
}
