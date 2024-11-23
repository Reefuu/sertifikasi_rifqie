<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Books::class, 'member_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($member) {
            // Delete all books borrowed by this member
            $member->books()->delete();
        });
    }
}
