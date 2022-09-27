<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\surat;

class category extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'category_name',
    ];

    protected $guarded = ['id'];

    public function surat()
    {
        return $this->hasMany(surat::class, 'number_category', 'id');
    }
}
