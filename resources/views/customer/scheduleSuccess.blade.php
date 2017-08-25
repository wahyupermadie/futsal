<html>
    <head>
    <link href="{{ asset('style/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    </head>
    <body>
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
                    <form action='{{url("customer/transaction/$transaksi/pelajar")}}' method="POST" id="pelajar">
                        {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-primary">PELAJAR</button>
                    </form>
                </td>
                <td>
                    <form action='{{url("customer/transaction/$transaksi/umum")}}' method="POST" id="umum">
                        {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-success">UMUM</button>
                    </form>
                </td>
				</tr>
		</table>
    </body>
<!-- Jquery Core Js -->
<script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset('style/plugins/bootstrap/js/bootstrap.js') }}"></script>
</html>