<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    public function colocation(){
        return $this->belongsTo(User::class,'user_colocation','colocation_id','user_id')->withPivot('role', 'left_at')->withTimestamps();       
    }
    public function expenses(){
        return $this->hasMany(Expense::class);
    }
    protected $fillable = ['name','colocation_id'];
}
