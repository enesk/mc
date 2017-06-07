<?php if(Auth::check()): ?>
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://placehold.it/160x160/00a65a/ffffff/&text=<?php echo e(Auth::user()->name[0]); ?>"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"><?php echo e(trans('backpack::base.administration')); ?></li>
                <li><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="fa fa-dashboard"></i>
                        <span><?php echo e(trans('backpack::base.dashboard')); ?></span></a></li>
            <!--
                <li class="treeview">
                    <a href="#"><i class="fa fa-newspaper-o"></i> <span>News</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/article')); ?>"><i class="fa fa-newspaper-o"></i> <span>Articles</span></a>
                        </li>
                        <li><a href="<?php echo e(url('admin/category')); ?>"><i class="fa fa-list"></i> <span>Categories</span></a>
                        </li>
                        <li><a href="<?php echo e(url('admin/tag')); ?>"><i class="fa fa-tag"></i> <span>Tags</span></a></li>
                    </ul>
                </li>
                !-->

                <li><a href="<?php echo e(url('admin/page')); ?>"><i class="fa fa-file-o"></i> <span>Seiten</span></a></li>
                <li class="treeview">
                    <a href="#!"><i class="fa fa-list"></i> <span>Menü verwaltung</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/menu')); ?>"><i class="fa fa-list"></i> <span>Menüs</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#!"><i class="fa fa-users"></i> <span>Teams</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/teams')); ?>"><i class="fa fa-list"></i> <span>Alle Teams</span></a>
                        </li>
                        <li><a href="<?php echo e(url('admin/members')); ?>"><i class="fa fa-list"></i> <span>Alle Mitglieder</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#!"><i class="fa fa-car"></i> <span>Vermietung</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/rental/stations')); ?>"><i class="fa fa-list"></i>
                                <span>Alle Stationen</span></a></li>
                        <li><a href="<?php echo e(url('admin/rental/categories')); ?>"><i class="fa fa-list"></i> <span>Alle Kategorien</span></a>
                        </li>
                        <li><a href="<?php echo e(url('admin/rental/classes')); ?>"><i class="fa fa-list"></i>
                                <span>Alle Klassen</span></a></li>
                        <li><a href="<?php echo e(url('admin/rental/specifics')); ?>"><i class="fa fa-list"></i> <span>Alle Ausstatungen</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#!"><i class="fa fa-bullhorn"></i> <span>Stellenanzeigen</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/jobs/categories')); ?>"><i class="fa fa-list"></i>
                                <span>Kategorien</span></a></li>
                        <li><a href="<?php echo e(url('admin/jobs')); ?>"><i class="fa fa-bullhorn"></i>
                                <span>Alle Stellenanzeigen</span></a>
                        </li>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/testimonials')); ?>"><i class="fa fa-comment-o "></i>
                        <span>Kundenmeinungen</span></a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/sliders')); ?>"><i class="fa fa-list"></i>
                        <span>Sliders</span></a>
                </li>
                <!-- Users, Roles Permissions -->
                <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/user')); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                        <li><a href="<?php echo e(url('admin/role')); ?>"><i class="fa fa-group"></i> <span>Roles</span></a></li>
                        <li><a href="<?php echo e(url('admin/permission')); ?>"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
                    </ul>
                </li>
                <?php endif; ?>
            <!--
                <li class="treeview">
                    <a href="#"><i class="fa fa-cogs"></i> <span>Advanced</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('admin/elfinder')); ?>"><i class="fa fa-files-o"></i>
                                <span>File manager</span></a></li>
                        <li><a href="<?php echo e(url('admin/backup')); ?>"><i class="fa fa-hdd-o"></i> <span>Backups</span></a>
                        </li>
                        <li><a href="<?php echo e(url('admin/log')); ?>"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
                        <li><a href="<?php echo e(url('admin/setting')); ?>"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                    </ul>
                </li>
                !-->
                <!-- ======================================= -->
                <li class="header"><?php echo e(trans('backpack::base.user')); ?></li>
                <li><a href="<?php echo e(url('admin/logout')); ?>"><i class="fa fa-sign-out"></i>
                        <span><?php echo e(trans('backpack::base.logout')); ?></span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php endif; ?>
