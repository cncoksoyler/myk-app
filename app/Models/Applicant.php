<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id');
    }

    public function result()
    {
        return $this->hasMany(Result::class, 'applicant_id');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'results')->withPivot('result');
    }
}
