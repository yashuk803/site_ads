<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    protected $table = 'ads';

    // Relations to eager load on every query.
    protected $with = ['author'];

    protected $fillable = [
        'description',
        'title',
        'author_id',
        'created_at',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getFromDateAttribute() {
        return \Carbon\Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }
}
