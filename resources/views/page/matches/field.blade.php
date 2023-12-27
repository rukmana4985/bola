{{-- <div class="row">
    <div class="col-md-6 ">
        <div class="form-body form-group form-md-line-input">
            {!! Template::selectbox($listTeam,@$data->home_team_id,"home_team_id",[ 'class' => 'form-control' ]) !!}
            <label>Team Home</label>
        </div>
        <div class="form-body form-group form-md-line-input">
            <input class="form-control" type="text" name="home_goal" value="{{ @$data->home_goal }}">
            <label>Skor Team Home</label>
        </div>
        
    </div>
    <div class="col-md-6 ">
        <div class="form-body form-group form-md-line-input">
            {!! Template::selectbox($listTeam,@$data->away_team_id,"away_team_id",[ 'class' => 'form-control' ]) !!}
            <label>Team Away</label>
        </div>
        <div class="form-body form-group form-md-line-input">
            <input class="form-control" type="text" name="away_goal" value="{{ @$data->away_goal }}">
            <label>Skor Team Away</label>
        </div>
        
    </div>
</div> --}}
<div class="row">
    <table class="table">
        <thead>
            <a class="btn btn-success" id="add_row"><i class="fa fa-plus"></i> Add</a><br><br>
            <tr>
                <th>Home Team</th>
                <th>Away Team</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody id="detail" class="table table-hover table-light">
                <tr>

                
                <td>
                    <div class="form-group form-md-line-input has-success">
                        {!! Template::selectbox($listTeam->toArray(),@$data->home_team_id,"home_team_id[]",[ 'class' => 'form-control selected' ]) !!}
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <input type="number" name="home_goal[]" id="" class="form-control">
                        <label for="">Skor</label>
                    </div>
                </td>
                <td>
                    <div class="form-group form-md-line-input has-success">
                        {!! Template::selectbox($listTeam->toArray(),@$data->away_team_id,"away_team_id[]",[ 'class' => 'form-control selected' ]) !!}
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <input type="number" name="away_goal[]" id="" class="form-control">
                        <label for="">Skor</label>
                    </div>
                </td>
                <td><a class="hapus" title="Delete Record" id=""><i class="fa fa-trash-o"></i></a></td>
             </tr>
            </tbody>
    </table>
</div>
<button class="btn green" type="submit" id="save">Save</button>
<button class="btn red"> Cancel </button>
@section('js')
<script>
$(document).ready(function() {
    $("body").on('click','.hapus', function(){
        $('.hapus').eq($(this).index()).parent().parent().remove();
    });
    $("input[name='number']").keypress(function(e) {
         if (e.which == 13) {
           if ($.trim($(this).val()) !== "") {
             if ($.trim($(this).val()) == $('input[name="foo[]"]').val()) {
               alert('VALUE : ' + $.trim($(this).val()) + ' is already exist');
               return false;
             }
           }
         }
       })
    $("#add_row").click(function(){
        var url = "{{ url('matches/detail') }}";
        $.get( url, function( data ) {
            $("#detail").append( data );
            $('select').select2();
        });
    });

    var checker = {};
    $('.selected').on('change',function(){
        var examSelect0 = $('.selected').eq(0).val();
        var examSelect1 = $('.selected').eq(1).val();
        if(examSelect0 == examSelect1){
            alert('Tidak bisa memilih data yang sama');
            location.reload();
        }
    });

    $("#save").click(function(){
        var a = $('.selected').val();
        var b = $('.selected1').val();
        if(a == b)
        {
            alert('Tidak boleh ada data pertandingan yang sama');
        }
    })

});
</script>
@endsection