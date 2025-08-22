<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /** @use HasFactory<\Database\Factories\AvatarFactory> */
    use HasFactory;

    protected $fillable = ['image', 'about_id'];

    public function about() {
        return $this->belongsTo(About::class);
    }
}
