<form action='{{url("transaction")}}' method="POST">
{{csrf_field()}}

	<div class="form-group">
        <div class="form-line">
        <label>Nama</label>
			<input class="form-control" type="text" name="name" required="required">
        </div>
    </div>

    <div class="form-group">
        <div class="form-line">
        <label>No Hp.</label>
			<input class="form-control" type="text" name="phone" required="required">
        </div>
    </div>
	<input type="hidden" name="schedule_id" value="{{$schedule_id}}">
	<input type="hidden" name="played_at" value="{{$played_at}}">
	<button type="submit" class="btn btn-primary">Simpan</button>
</form>