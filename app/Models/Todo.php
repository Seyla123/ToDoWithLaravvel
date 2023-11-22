<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title','user_id', 'description', 'Is_Completed','Is_Deleted'];


    //The user_id column in the todos table is a foreign key referencing the id column in the users table
    public function user(){

        return $this->belongsTo(User::class);
    }
}
