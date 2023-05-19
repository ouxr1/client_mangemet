<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['full_name','email','phone','social_media','company_name','job_title','country','purchase','next_call_date'];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function getNextCallDateAttribute()
    {
        return $this->attributes['next_call_date'] ? date('d-m-Y', strtotime($this->attributes['next_call_date'])) : '-';
    }
}
