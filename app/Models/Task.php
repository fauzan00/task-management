<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['title', 'description', 'deadline', 'completed', 'completed_at', 'workspace_id'];

    protected $casts = [
        'deadline' => 'datetime',
        'completed_at' => 'datetime',
        'completed' => 'boolean',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function deadlineStatus()
    {
        if ($this->completed) {
            return 'Completed '.$this->completed_at->diffForHumans();
        }

        return 'Due '.$this->deadline->diffForHumans();
    }
}
