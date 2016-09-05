<?php
namespace Modules\Team\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Member extends Model
{
    use CrudTrait;

    protected $table = 'teams_members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'tel',
        'mail',
        'photo',
        'team_id',
        'order'
    ];

    public function team()
    {
        return self::belongsTo(Team::class);
    }
}