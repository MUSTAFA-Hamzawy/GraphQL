<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_id';
    public $timestamps = false;
    protected $table = 'books';
    protected $guarded = [];

    public function author(){
        $this->belongsTo(Author::class);
    }
}
