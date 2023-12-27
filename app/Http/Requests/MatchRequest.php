<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class MatchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'home_team_id' => 'required',
            'away_team_id' => 'required',
            'home_goal'    => 'required',
            'away_goal'    => 'required',
        ];

        
    }
    public function home()
        {
            return $this->belongsTo('App\Models\Team', 'home_team_id');
        }
        public function away()
        {
            return $this->belongsTo('App\Models\Team', 'away_team_id', 'id');
        }

}
