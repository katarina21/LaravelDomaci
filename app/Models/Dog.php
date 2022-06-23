<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'age'
    ];

    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    public function breed(){
        return $this->belongsTo(Breed::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
