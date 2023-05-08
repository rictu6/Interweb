<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FundCluster extends Model
{use SoftDeletes;
    protected $table = 'tbl_fund_cluster';
    protected $primaryKey = 'fund_cluster_id';
}
