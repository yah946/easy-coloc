<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;
    protected $fillable = ['name','status']; 
    public function users(){
        return $this->belongsToMany(User::class,'user_colocation','colocation_id','user_id')->withPivot('role', 'left_at')->withTimestamps();       
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function invitations(){
        return $this->hasMany(Invitation::class);
    }
}