<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPurpose extends Model
{
    use HasFactory;

    protected $table ="sub_purpose";
    protected $fillable = ['visa_code','sub_purpose'];
}
