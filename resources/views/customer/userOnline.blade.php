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
</table>