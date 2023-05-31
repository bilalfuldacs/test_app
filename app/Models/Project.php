<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


   
       public function user(): BelongsTo
       {
           return $this->belongsTo(User::class);
       }
       public function Time_Logs(){
       return  $this->hasMany(Time_Log::class,'Project_id');
    }
    
}
