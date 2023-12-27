<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
                            'id',
                            'name',
                            'city',
                            'poin',
                            'win_goal',
                            'lose_goal',
                            'win',
                            'lose',
                            'playing',
                            'seri'
                          ];

 
    public function home()
    {
        return $this->hasMany('home_team_id', 'id');
    }
}
