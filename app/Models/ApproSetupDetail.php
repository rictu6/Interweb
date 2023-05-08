<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;



class ApproSetup extends Model
{
    use Notifiable;
    use LogsActivity;
    use SoftDeletes;


    protected $table = 'tbl_appropriation_setup';

    protected $primaryKey = 'appro_setup_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appro_dtl_id',
        'appro_setup_id',
        'uacs_subobject_code',
        'allotment_received',

    'updated_at',
    'created_at',
    'deleted_at'
    ];
    public function local_chief_exec()
    {
        return $this->belongsTo(ApproSetup::class,'appro_setup_id','appro_setup_id')->withTrashed();
    }
}
