<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'exam_id',
        'applicant_id',
        'result'
    ];

   

    protected $dates = [ 'deleted_at' ];

    public function applicantDetails()
    {
        return $this->belongsTo(Applicant::class,'applicant_id');
    }

    public function examDetails()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
    
    
}
