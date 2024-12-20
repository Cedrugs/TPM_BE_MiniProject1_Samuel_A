<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "TaskName",
        "TaskDescription",
        "CategoryId",
        "TaskImage",
        "CreatedBy"
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'CategoryId');
    }
}
