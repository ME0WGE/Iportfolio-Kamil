<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */
    use HasFactory;

    protected $table = 'abouts';
    protected $fillable =['subtitle', 'birthdate', 'website', 'phone', 'city', 'age', 'degree', 'email', 'freelance', 'subtext'];

    public function avatar() {
        return $this->hasOne(Avatar::class);
    }
}
