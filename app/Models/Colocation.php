<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;
    protected $fillable = ['name','status']; 
    public function user(){
        return $this->belongsToMany(User::class,'user_colocation','colocation_id','user_id');       
    }
}
