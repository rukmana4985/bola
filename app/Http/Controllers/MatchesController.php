<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;

use App\Models\Match;
use App\Models\Team;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class MatchesController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Match $main_model){
        $this->title        = 'Match';
        $this->view         = 'matches';
        $this->main_model   = $main_model;
        $this->validate     = 'MatchRequest';
        
        $listTeam          = Team::pluck('name','id');

        View::share('listTeam', $listTeam);
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index(Request $request)
    {   $datas = $this->main_model->get();
        // $columns = ['home.name','away.name','home_goal','away_goal','action'];
        // if($request->ajax())
        // {
        //     return Datatables::of($datas)
        //         ->addColumn('action',function($data){
        //                 return view('page.'.$this->view.'.action',compact('data'));
        //             })
        //         ->escapeColumns(['actions'])
        //         ->make(true);
        // }
        
     	return view('page.'.$this->view.'.index')
			->with(compact('datas'));
    }

    public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }

    public function store(MatchRequest $request)
    {
        $input = $request->all();
       
    	DB::beginTransaction();
    	try{
            foreach($input['home_team_id'] as $k => $v)
            {
                $input_detail['home_team_id']= $input['home_team_id'][$k];
                $input_detail['away_team_id']= $input['away_team_id'][$k];
                $input_detail['away_goal']= $input['away_goal'][$k];
                $input_detail['home_goal']= $input['home_goal'][$k];
                $data = $this->main_model->create($input_detail);
                $menang = 3;
                $kalah = 0;
                $seri = 1;
                if($input['home_goal'][$k] > $input['away_goal'][$k])
                {
                   $q = Team::find($data->home_team_id);
                   $q->update(['poin' => $q->poin + $menang,
                    'win_goal' => $q->win_goal +$input['home_goal'][$k],
                    'win' => $q->win + 1,
                    'playing' => $q->playing +1,
                    ]);
                    $q = Team::find($data->away_team_id);
                    $q->update(['poin' => $q->poin + $kalah,
                    'lose_goal' => $q->lose_goal +$input['away_goal'][$k],
                    'lose' => $q->lose + 1,
                    'playing' => $q->playing +1,
                    ]);
                }
                else if($input['home_goal'][$k] < $input['away_goal'][$k])
                {
                    $q = Team::find($data->home_team_id);
                   $q->update(['poin' => $q->poin + $kalah,
                    'lose_goal' => $q->lose_goal +$input['home_goal'][$k],
                    'lose' => $q->lose + 1,
                    'playing' => $q->playing +1,
                    ]);
                    $q = Team::find($data->away_team_id);
                    $q->update(['poin' => $q->poin + $menang,
                    'win_goal' => $q->win_goal +$input['away_goal'][$k],
                    'win' => $q->win + 1,
                    'playing' => $q->playing +1,
                    ]);
                }
                else{
                    $q = Team::find($data->home_team_id);
                        $q->update(['poin' => $q->poin + $seri,
                        'playing' => $q->playing +1,
                        'seri' => $q->seri +1,
                     ]);
                     $q = Team::find($data->away_team_id);
                        $q->update(['poin' => $q->poin + $seri,
                        'playing' => $q->playing +1,
                        'seri' => $q->seri +1,
                     ]);
                }
                

            }
	        DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
	    }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.edit')->with(compact('validator','data'));
    }

    public function update(MatchRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
    	DB::beginTransaction();
    	try{
            $data->fill($input)->save();
	        DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
	    }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
    	try{
        	$data->delete();
        	DB::commit();
            toast()->success('Data berhasil di hapus', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }


    public function detail()
    {
        return view('page.'.$this->view.'.detail');
    }

    public function klasemen()
    {
        $datas = Team::orderBy('poin','desc')->get();
        return view('page.'.$this->view.'.klasemen')->with(compact('datas'));
    }
}
