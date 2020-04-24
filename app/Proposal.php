<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Proposal extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'proposals';

    protected $appends = [
        'attachments',
    ];

    protected $dates = [
        'delivery_time',
        'approved_at',
        'rejected_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'job_id',
        'freelancer_id',
        'proposal_text',
        'budget',
        'delivery_time',
        'approved_at',
        'rejected_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);

    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');

    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');

    }

    public function getDeliveryTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setDeliveryTimeAttribute($value)
    {
        $this->attributes['delivery_time'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');

    }

    public function getApprovedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setApprovedAtAttribute($value)
    {
        $this->attributes['approved_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }

    public function getRejectedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;

    }

    public function setRejectedAtAttribute($value)
    {
        $this->attributes['rejected_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;

    }
}
