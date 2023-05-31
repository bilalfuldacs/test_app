<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Time_Log extends Model
{
    use HasFactory;

      protected $fillable = [

        'start_time',
        'end_time',
          'project_id',
        'user_id',
        'date',
    ];

   
      public function user()
      {
          return $this->belongsTo(User::class);
      }
    public function project()
{
    return $this->belongsTo(Project::class, 'Project_id');
}

    
    }
