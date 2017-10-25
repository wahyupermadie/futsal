<!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo e(asset('images/customer_user/'.Auth::user()->picture)); ?>" width="50" height="50" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($futsal->name); ?></div>
                    <div class="email"><?php echo e(Auth::user()->name); ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if( Request::segment(1) === 'home'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e((URL('/home'))); ?>">
                            <i  class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li <?php if( Request::segment(1) === 'field'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(URL('/field')); ?>">
                            <i class="material-icons">assignment</i>
                            <span>Tambah Lapangan</span>
                        </a>
                    </li>
                    <li <?php if( Request::segment(1) === 'schedule'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(URL('/schedule')); ?>">
                            <i class="material-icons">assignment</i>
                            <span>Tambah Jadwal</span>
                        </a>
                    </li>
                    <li <?php if( Request::segment(1) === 'report'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(URL('/report')); ?>">
                            <i class="material-icons">assignment</i>
                            <span>Lihat Report</span>
                        </a>
                    </li>
                    <li <?php if( Request::segment(1) === 'profile'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e((URL('/profile'))); ?>">
                            <i  class="material-icons">assignment</i>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <a href="javascript:void(0);">Futsal Network</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->