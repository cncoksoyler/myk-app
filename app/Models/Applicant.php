<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'TC',
        'mobile',
        'workplace',
        'profession_id',
        'speciality_detail',
        'subspeciality_detail'
    ];
    
    public function modelProfession()
    {
        return $this->belongsTo(Profession::class,'profession_id');
    }

}