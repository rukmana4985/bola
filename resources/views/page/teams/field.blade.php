<div class="row">
    <div class="col-md-6 ">
        
        <div class="form-body form-group form-md-line-input">
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            <label>Nama</label>
        </div>
        <div class="form-body form-group form-md-line-input">
            <input class="form-control" type="text" name="city" value="{{ @$data->city }}">
            <label>Kota</label>
        </div>
        
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<button class="btn red"> Cancel </button>
