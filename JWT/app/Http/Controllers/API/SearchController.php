<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class SearchController extends Controller
{
    public function search($description)
    {
        return Task::where("description", "like", "%" . $description . "%")->get();
    }
}
