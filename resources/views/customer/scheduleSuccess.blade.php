<table class="table table-bordered">
    <tr align="center">
        <td colspan="2"><img src="{{asset('images/users/'.$user->picture)}}" alt="" style="width:200px;"></td>
	</tr>
	<tr align="center">
		<td colspan="2">{{$user->name}}</td>
	</tr>
    <tr align="center">
        <td colspan="2">{{$user->phone}}</td>
	</tr>
    <tr align="center">
        <td colspan="2">{{$user->email}}</td>
	</tr>
    <tr align="center">
        <td>
            <form action='{{url("transaction/$transaksi/pelajar")}}' method="POST" id="pelajar">
                {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-primary">PELAJAR</button>
            </form>
        </td>
        <td>
            <form action='{{url("transaction/$transaksi/umum")}}' method="POST" id="umum">
                {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success">UMUM</button>
            </form>
        </td>
	</tr>
</table>