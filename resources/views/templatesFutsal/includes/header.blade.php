    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">FutNet - Futsal Dashboard</a>
            </div>
            <div class="navbar-header right">
            <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                <li role="seperator" class="divider"></li>
                <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                <li role="seperator" class="divider"></li>
                <li>
                <a href="{{route('customer.logout')}}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                <i class="material-icons">input</i>Sign out</a>
                    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div> 
            </div>
        </div>
    </nav>