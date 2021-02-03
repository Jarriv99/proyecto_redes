<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Picture
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Picture newModelQuery()
 * @method static Builder|Picture newQuery()
 * @method static Builder|Picture query()
 * @method static Builder|Picture whereCreatedAt($value)
 * @method static Builder|Picture whereDescription($value)
 * @method static Builder|Picture whereId($value)
 * @method static Builder|Picture whereTitle($value)
 * @method static Builder|Picture whereUpdatedAt($value)
 * @method static Builder|Picture whereUrl($value)
 * @method static Builder|Picture whereUserId($value)
 * @mixin Eloquent
 */
class Picture extends Model
{
    protected $fillable = ['id', 'title', 'url', 'description', 'user_id'];
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
