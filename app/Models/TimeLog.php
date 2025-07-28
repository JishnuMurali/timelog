<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'log_date', 'task', 'hours', 'minutes'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
