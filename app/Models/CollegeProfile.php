<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'phone',
        'college_name',
        'principal_name',
        'state',
        'district',
        'city',
        'year_of_establishment',
        'address',
        'certificate',
        'document'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function setDocumentAttribute($value){
        $this->attributes['document'] = FileHelper::saveFile($value,'/uploaded_files/');
    }
}
