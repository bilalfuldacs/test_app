<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectRepository
{
    public function getProjectsByUserId()
    {
        return Project::select('name','id')->where('user_id', Auth::user()->id)->get();
    }
}
