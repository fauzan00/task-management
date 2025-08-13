<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function workspace()
{
    return $this->belongsTo(Workspace::class);
}

// Human readable time methods
public function deadlineStatus()
{
    if ($this->completed) {
        return 'Completed ' . $this->completed_at->diffForHumans();
    }
    
    return 'Due ' . $this->deadline->diffForHumans();
}
}
