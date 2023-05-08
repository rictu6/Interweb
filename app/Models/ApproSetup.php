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
        'appro_setup_id' ,
    'budget_year' ,
        'month' ,
            'fund_source' ,
             'pap_code' ,
  'allotment_class_id' ,
  'sub_allotment_no' ,
  'status' ,
  'processedby' ,
  'budget_type' ,
  'file_path',
  'charge_to_regular' ,
    'withdrawn' ,
  'upload_date' ,
     'cms_status_id' ,

  'uacs_subobject_code' ,
  'updated_at' ,
  'created_at' ,
  'deleted_at'
    ];
    public function approdtls()
    {
      return $this->hasMany(ApproSetupDetail::class,'appro_setup_id','appro_setup_id');
    }

}
