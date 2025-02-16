<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewSkills extends Model
{
    use HasFactory;

    protected $fillable = ['module_crew_id', 'name'];

    // Relationship with ModuleCrew
    public function moduleCrew()
    {
        return $this->belongsTo(ModuleCrew::class);
    }
}
