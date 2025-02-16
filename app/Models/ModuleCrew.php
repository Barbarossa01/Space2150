<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleCrew extends Model
{
    use HasFactory;

    protected $table = 'module_crew';

    protected $fillable = ['ship_module_id', 'nick', 'gender', 'age'];

    public function shipModule()
    {
        return $this->belongsTo(ShipModules::class);
    }

    public function crewSkills()
    {
        return $this->hasMany(CrewSkills::class);
    }
}
