<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\login\index.html";i:1522113810;s:60:"F:\phpStudy\WWW\zhuo\application\admin\view\public\base.html";i:1523617509;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta name="description" content="">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>电商cms</title>
<style>
    .form-signin .form-code{
        display: inline-block;
        width: 40%;
        vertical-align: top;
    }
</style>

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
        
        
        
<form class="form-signin" method="post" action="<?php echo url('getLogin'); ?>">
    <h2 class="form-signin-heading">后台入口</h2>
    <div class="login-wrap">
        <input type="text" class="form-control" name="name" placeholder="用户名" autofocus>
        <input type="password" class="form-control" name="passwords" placeholder="密码">
        <div>
            <input type="text" class="form-control form-code" name="code">
            <img src="<?php echo url('setCode'); ?>" onclick="this.src='<?php echo url("setCode"); ?>'" alt="captcha">
        </div>
        <button class="btn btn-lg btn-login btn-block" type="submit">登录</button>
        <p>欢迎进入后台系统</p>
    </div>
</form>

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
    <script src="/static/admin/plugins/loading/loading-1.0.js"></script>
    <script src="/static/admin/js/zhuo-common.js"></script>
    
</body>
</html>