<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Weekday extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_weekdays';

    public $timestamps=false;

    protected $primaryKey = 'wd_id';

    protected $fillable = [
        'wd_id',
        'wd_desc'
     
    ];
  
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Weekday was {$eventName}";
    }
    public function timetables()
    {
        return $this->hasMany(Timetable::class,'weekday','wd_id');
    }
}
