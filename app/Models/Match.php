<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    
    protected $fillable = ['id','home_team_id','away_team_id','home_goal','away_goal'];

    protected $primaryKey = 'id';
    public function home()
    {
        return $this->belongsTo('App\Models\Team', 'home_team_id','id');
    }
    
    public function away()
    {
        return $this->belongsTo('App\Models\Team', 'away_team_id');
    }
}
