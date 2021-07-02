<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";

    public function DataBarang()
    {
        return $this->hasOne(DataBarang::class);
    }
}
