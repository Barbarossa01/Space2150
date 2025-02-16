<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipModules extends Model
{
    use HasFactory;

    protected $table = 'ship_modules';

    protected $fillable = ['module_name', 'is_workable'];

    /**
     * Relationship: A ShipModule has many ModuleCrew entries.
     */
    public function moduleCrew()
    {
        return $this->hasMany(ModuleCrew::class);
    }
}
