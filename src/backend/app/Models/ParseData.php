<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParseData extends Model
{
    use HasFactory;

    protected string $table = 'parse_data';

    protected array $fillable = ['url'];

    protected array $guarded = ['id'];

    public function parse(): BelongsTo
    {
        return $this->belongsTo(Parse::class);
    }

    public function parseDataResults(): HasMany
    {
        return $this->hasMany(ParseDataResult::class);
    }
}
