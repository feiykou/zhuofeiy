<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"/data/www/zhuo/public/../application/admin/view/index/index.html";i:1527241923;s:54:"/data/www/zhuo/application/admin/view/public/base.html";i:1526043810;s:56:"/data/www/zhuo/application/admin/view/public/header.html";i:1525930324;s:54:"/data/www/zhuo/application/admin/view/public/left.html";i:1527644866;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>电商cms</title>

    <link rel="shortcut icon" href="img/favicon.html">
    <!-- Bootstrap core CSS -->
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!-- 字体表 -->
    <link href="/static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- 主要样式表-->
    <link href="/static/admin/css/style.css" rel="stylesheet">
    <!-- 响应式css -->
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="/static/admin/css/plugins/custom.css">
    <link rel="stylesheet" href="/static/admin/css/zhuo-style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/static/admin/js/html5shiv.js"></script>
    <script src="/static/admin/js/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    <section id="container" class="">
        
    <!--header start-->
<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <!--logo start-->
    <a href="#" class="logo">Flat<span>lab</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="icon-tasks"></i>
                    <span class="badge bg-success">6</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have 6 pending tasks</p>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">40%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Database Update</div>
                                <div class="percent">60%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Iphone Development</div>
                                <div class="percent">87%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Mobile App</div>
                                <div class="percent">33%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">45%</div>
                            </div>
                            <div class="progress progress-striped active">
                                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="external">
                        <a href="#">See All Tasks</a>
                    </li>
                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="icon-envelope-alt"></i>
                    <span class="badge bg-important">5</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">You have 5 new messages</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="/static/admin/img/avatar-mini.jpg"></span>
                            <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                            <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="/static/admin/img/avatar-mini2.jpg"></span>
                            <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                            <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="/static/admin/img/avatar-mini3.jpg"></span>
                            <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                            <span class="message">
                                        This is awesome dashboard.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="/static/admin/img/avatar-mini4.jpg"></span>
                            <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                            <span class="message">
                                        Hello, this is metrolab
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">See all messages</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
            <li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                    <i class="icon-bell-alt"></i>
                    <span class="badge bg-warning">7</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <div class="notify-arrow notify-arrow-yellow"></div>
                    <li>
                        <p class="yellow">You have 7 new notifications</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-danger"><i class="icon-bolt"></i></span>
                            Server #3 overloaded.
                            <span class="small italic">34 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-warning"><i class="icon-bell"></i></span>
                            Server #10 not respoding.
                            <span class="small italic">1 Hours</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-danger"><i class="icon-bolt"></i></span>
                            Database overloaded 24%.
                            <span class="small italic">4 hrs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-success"><i class="icon-plus"></i></span>
                            New user registered.
                            <span class="small italic">Just now</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-info"><i class="icon-bullhorn"></i></span>
                            Application error.
                            <span class="small italic">10 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">See all notifications</a>
                    </li>
                </ul>
            </li>
            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder="Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="/static/admin/img/avatar1_small.jpg">
                    <span class="username"><?php  echo session('username','','admin') ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                    <li><a href="<?php echo url('user/logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->

        
    <!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="javascript:;" data-href="/index">
                    <i class="icon-dashboard"></i>
                    <span>首页</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>文章管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="javascript:;" data-href="/artlist">文章列表</a></li>
                    <li><a class="" href="javascript:;" data-href="/artcon">添加文章</a></li>
                    <!--<li><a class="" href="javascript:;" data-href="/artcate">文章分类</a></li>-->
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>分类</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="javascript:;" data-href="/cate">产品分类</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>商品管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="javascript:;" data-href="/product">商品列表</a></li>
                    <li><a class="" href="javascript:;" data-href="/proAdd">添加商品</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>轮播位管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="javascript:;" data-href="/bannerItem">轮播位列表</a></li>
                    <li><a class="" href="javascript:;" data-href="/bannerItemAdd">添加轮播</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i>
                    <span>订单管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="javascript:;" data-href="basic_table.html">订单查询</a></li>
                    <!--<li><a class="" href="form_wizard.html">Form Wizard</a></li>-->
                    <!--<li><a class="" href="form_validation.html">Form Validation</a></li>-->
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-th"></i>
                    <span>权限管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="javascript:;" data-href="/user">管理员列表</a></li>
                    <li><a class="" href="javascript:;" data-href="/role">角色列表</a></li>
                    <li><a class="" href="javascript:;" data-href="/rule">权限列表</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

        
<section class="content">
    <iframe src="/index" id="main-iframe" frameborder="0" width="100%" height="100%"></iframe>
</section>

    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
    <!-- 滚动条样式 -->
    <script src="/static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery.scrollTo.min.js"></script>
    <!--common script for all pages-->
    <script src="/static/admin/js/common-scripts.js"></script>
    <script src="/static/admin/js/custom.js"></script>
    <script src="/static/admin/lib/loading/loading-1.0.js"></script>
    <script src="/static/admin/js/zhuo-common.js"></script>
    


</body>
</html>