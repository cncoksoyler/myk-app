<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'period',
        'exam_date',
        'description'
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'results')->withPivot('result');
    }
}
