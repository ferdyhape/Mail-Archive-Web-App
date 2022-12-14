<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'letter_number',
        'title',
        'category_id',
        'archive_time',
        'file',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
