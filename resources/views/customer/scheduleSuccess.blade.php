<html>
    <head>
    <link href="{{ asset('style/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    </head>
    <body>
        <table class="table table-bordered">
                <tr align="center">
                    <td><img src="{{asset('images/users/'.$user->picture)}}" alt="" style="width:200px;"></td>
				</tr>
				<tr align="center">
					<td>{{$user->name}}</td>
				</tr>
                <tr align="center">
                    <td>{{$user->phone}}</td>
				</tr>
                <tr align="center">
                    <td>{{$user->email}}</td>
				</tr>
		</table>
    </body>
<!-- Jquery Core Js -->
<script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset('style/plugins/bootstrap/js/bootstrap.js') }}"></script>
</html>