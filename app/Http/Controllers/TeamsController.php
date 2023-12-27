<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;

use App\Models\Team;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class TeamsController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Team $main_model){
        $this->title        = 'Team';
        $this->view         = 'teams';
        $this->main_model   = $main_model;
        $this->validate     = 'TeamRequest';

        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index(Request $request)
    {
        $columns = ['name','city','action'];
        $datas = $this->main_model->select(['*']);
        if($request->ajax())
        {
            return Datatables::of($datas)
                ->addColumn('action',function($data){
                        return view('page.'.$this->view.'.action',compact('data'));
                    })
                ->escapeColumns(['actions'])
                ->make(true);
        }
     	return view('page.'.$this->view.'.index')
			->with(compact('datas','columns'));
    }

    public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }

    public function store(TeamRequest $request)
    {
        $input = $request->all();
    	DB::beginTransaction();
    	try{
            $data = $this->main_model->create($input);
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

    public function update(TeamRequest $request, $id)
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
}
