<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParseDataResult extends Model
{
    protected string $table = 'parse_data_result';

    protected array $fillable = ['result'];

    protected array $guarded = ['id'];

    public function parseData(): BelongsTo
    {
        return $this->belongsTo(ParseData::class);
    }
}
