<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected  $fillable = [
        "user_id",
        "title",
        "date",
        "dueDate",
        "description",
        "created_at",
        "updated_at"
    ];
}
