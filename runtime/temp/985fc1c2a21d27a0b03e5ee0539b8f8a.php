<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\role\add.html";i:1522208037;s:60:"F:\phpStudy\WWW\zhuo\application\admin\view\public\base.html";i:1522113810;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta name="description" content="">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>电商cms</title>
<link rel="stylesheet" href="/static/admin/assets/beyond/css/beyond.css">

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
        
        
        
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        添加角色
                    </header>
                    <form class="add-form" method="post" action="<?php echo url('add'); ?>">
                        <div class='modal-body'>
                            <div class='form-group'>
                                <label class='control-label'>角色名：</label>
                                <input type='text' class='form-control' name='title'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>启动状态：</label>
                                <label class="status-start"><input class="status_check inverted" type="checkbox" checked="checked" name="status" value="1"><span class="text"></span><b>启动</b></label>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <table class="table table-hover">
                                        <thead class="bordered-darkorange">
                                        <tr>
                                            <th>
                                                配置权限
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($ruleData) || $ruleData instanceof \think\Collection || $ruleData instanceof \think\Paginator): $i = 0; $__LIST__ = $ruleData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authRule): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td>
                                                <label>
                                                    <?php echo str_repeat('&nbsp;', $authRule['level']*3);?>
                                                    <input name="rules[]" value="<?php echo $authRule['id']; ?>" dataid="id-<?php echo $authRule['dataid']; ?>" class="inverted checkbox-parent <?php if($authRule['level'] != 0): ?> checkbox-child <?php endif; ?> " type="checkbox">
                                                    <span <?php if($authRule['level'] == 0): ?> style="font-weight:bold; font-size:14px;" <?php endif; ?> class="text"><?php echo $authRule['title']; ?></span>
                                                </label>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
                            <button type='button' class='btn btn-primary cateAdd-sub'>提交</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->


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
    
<script>

    //动态选择框，上下级选中状态变化
    $('input.checkbox-parent').on('change', function () {
        var dataid = $(this).attr("dataid");
        $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
    });
    $('input.checkbox-child').on('change', function () {
        var dataid = $(this).attr("dataid");
        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
        var parent = $('input[dataid=' + dataid + ']');
        if ($(this).is(':checked')) {
            parent.prop('checked', true);
            //循环到顶级
            while (dataid.lastIndexOf("-") != 2) {
                dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                parent = $('input[dataid=' + dataid + ']');
                parent.prop('checked', true);
            }
        } else {
            //父级
            if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                parent.prop('checked', false);
                //循环到顶级
                while (dataid.lastIndexOf("-") != 2) {
                    dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                    parent = $('input[dataid=' + dataid + ']');
                    if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                        parent.prop('checked', false);
                    }
                }
            }
        }
    });

    $(".status_check").on('click',function(){

        if(!$(this).is(":checked")){
            $(this).next().next().text("未启动");
            $(this).val(0);
        }else{
            $(this).next().next().text("启动");
            $(this).val(1);
        }
    });

    $(".cateAdd-sub").on("click",function () {
        $(".add-form").submit();
    });
</script>

</body>
</html>