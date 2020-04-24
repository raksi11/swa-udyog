<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Job extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'jobs';

    protected $appends = [
        'files',
    ];

    protected $dates = [
        'due_date',
        'hired_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'client_id',
        'freelancer_id',
        'title',
        'description',
        'budget',
        'due_date',
        'hired_at',
        'language',
        'framework',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);

    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');

    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');

    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files');

    }

    public function getHiredAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setHiredAtAttribute($value)
    {
        $this->attributes['hired_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }
}
