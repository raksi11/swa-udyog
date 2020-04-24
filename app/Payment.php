<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'to_id',
        'amount',
        'status',
        'job_id',
        'from_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');

    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to_id');

    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');

    }
}
