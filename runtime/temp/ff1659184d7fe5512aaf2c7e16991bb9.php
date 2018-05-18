<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\cate\index.html";i:1526004340;s:60:"F:\phpStudy\WWW\zhuo\application\admin\view\public\base.html";i:1526017104;}*/ ?>
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
        
        
        

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading cate-heading">
                            分类管理
                        </header>
                        <div class="cate-opear">
                            <span class="btn btn-shadow btn-danger btn-add-cate" data-toggle="modal" data-target="#add-modal" data-whatever="@mdo">添加分类</span>
                        </div>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="icon-bullhorn"></i> 分类id</th>
                                <th class="hidden-phone"><i class="icon-question-sign"></i>当前类</th>
                                <th><i class="icon-bookmark"></i> 父类</th>
                                <th><i class=" icon-edit"></i> 操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($cateArr) || $cateArr instanceof \think\Collection || $cateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $cateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><span><?php echo $data['id']; ?></span></td>
                                    <td class="hidden-phone"><?php echo str_repeat('--',$data['level'] *2); ?> <?php echo $data['name']; ?></td>
                                    <td><?php if($data['pid'] == 0): ?>顶级部门<?php else: ?><?php echo $data['pname']; endif; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-xs btn-edit" data-id="<?php echo $data['id']; ?>" data-toggle="modal" data-target="#edit-modal"><i class="icon-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs btn-del" data-id="<?php echo $data['id']; ?>" data-toggle="modal" data-target="#del-modal"><i class="icon-trash "></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>

                        <nav class="paging-wrap" aria-label="...">
                            <?php echo $page; ?>
                        </nav>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog cate-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog cate-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!-- 删除dialog -->
    <div class="modal fade" id="del-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog cate-dialog" role="document">
            <div class="modal-content">
                <form id='cate-del-form'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'></span></button><h4 class='modal-title'>删除</h4>
                    </div>
                    <div class='modal-body' style=" font-size: 18px; padding: 20px 0 10px 30px;">
                        <span>是否要删除！</span>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
                        <button type='button' class='btn btn-primary cateDel-sub'>提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    

<script>
    /*
    * 添加分类
    * */
    loadPage.init({
        clickDom:$(".btn-add-cate"),
        modalConDom:$("#add-modal .modal-content"),
        "url": "<?php echo url('add'); ?>"
    });

    /*
    * 添加分类提交
    * */
    $("#add-modal").on("click",'.cateAdd-sub',function() {
        reqAjaxJson.init({
            url: "<?php echo Url('add'); ?>",
            reqData: $('#cate-add-form').serialize(),
            modalDom: $('#zhuo-modal'),
            redirectP: "/cate"
        });
    });

    // 点击编辑
    loadPage.init({
        clickDom:$(".btn-edit"),
        modalConDom:$("#edit-modal .modal-content"),
        url: "<?php echo url('edit'); ?>",
        attrArr: ['id']
    });

    // 编辑提交
    $("#edit-modal").on("click",'.cateEdit-sub',function(){
        var editId = $(this).data('id');
        reqAjaxJson.init({
            url: "<?php echo Url('handleEdit'); ?>?id="+editId,
            reqData: $('#cate-edit-form').serialize(),
            modalDom: $('#edit-modal'),
            redirectP: "/cate",
            attrArr: ['id']
        });
    });

    // 删除
    modelReq({
        "modalId": "#del-modal",
        "url": "<?php echo Url('cateDel'); ?>",
        "redirectP": "/cate",
        "sureClass": ".cateDel-sub",
        "btnClass": ".btn-del"
    });

</script>

</body>
</html>