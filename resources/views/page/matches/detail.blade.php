<tr>

                
    <td>
        <div class="form-group form-md-line-input has-success">
            {!! Template::selectbox($listTeam->toArray(),@$data->home_team_id,"home_team_id[]",[ 'class' => 'form-control selected1' ]) !!}
        </div>
        <div class="form-group form-md-line-input has-success">
            <input type="number" name="home_goal[]" id="" class="form-control">
            <label for="">Skor</label>
        </div>
    </td>
    <td>
        <div class="form-group form-md-line-input has-success">
            {!! Template::selectbox($listTeam->toArray(),@$data->away_team_id,"away_team_id[]",[ 'class' => 'form-control selected1' ]) !!}
        </div>
        <div class="form-group form-md-line-input has-success">
            <input type="number" name="away_goal[]" id="" class="form-control">
            <label for="">Skor</label>
        </div>
    </td>
    <td><a class="hapus" title="Delete Record" id=""><i class="fa fa-trash-o"></i></a></td>
 </tr>