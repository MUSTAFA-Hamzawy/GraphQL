<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_id';
    public $timestamps = false;
    protected $table = 'books';
    protected $guarded = [];

    public function author(): BelongsTo{
        return $this->belongsTo(Author::class, 'author_id');
    }
}
