<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\user\index.html";i:1522207349;s:60:"F:\phpStudy\WWW\zhuo\application\admin\view\public\base.html";i:1523617509;}*/ ?>
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
                              用户管理员
                          </header>
                          <div class="cate-opear">
                              <span class="btn btn-shadow btn-danger add-user-btn" data-toggle="modal" data-target="#add-user-modal">添加管理员</span>
                          </div>
                          <table class="table table-striped border-top" id="sample_1">
                          <thead>
                          <tr>
                              <th style="width:8px;"></th>
                              <th>id</th>
                              <th>用户名</th>
                              <th class="hidden-phone">角色</th>
                              <th class="hidden-phone">操作</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php if(is_array($userData) || $userData instanceof \think\Collection || $userData instanceof \think\Paginator): $i = 0; $__LIST__ = $userData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                              <tr class="odd gradeX">
                                  <td></td>
                                  <td><?php echo $data['id']; ?></td>
                                  <td><?php echo $data['name']; ?></td>
                                  <td class="hidden-phone"><?php if(($data['title'] == '') and ($data['name'] != 'admin')): ?>无角色<?php elseif($data['name'] == 'admin'): ?>超级管理员<?php else: ?><?php echo $data['title']; endif; ?></td>
                                  <td class="view-message"><span class="btn btn-primary btn-xs mr10 btn-del" data-id="<?php echo $data['id']; ?>" data-toggle="modal" data-target="#del-modal">删除</span> <span data-id="<?php echo $data['id']; ?>" data-group_ids="<?php echo $data['group_ids']; ?>" data-target="#edit-user-modal" data-toggle="modal" class="btn btn-primary btn-xs btn-edit">编辑</span></td>
                              </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                          </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

    <!--添加管理员-->
    <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog cate-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!--编辑管理员-->
    <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                        <button type='button' class='btn btn-primary del-sub'>提交</button>
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
    <script src="/static/admin/plugins/loading/loading-1.0.js"></script>
    <script src="/static/admin/js/zhuo-common.js"></script>
    
    <script>
        loadPage.init({
            "clickDom": $(".add-user-btn"),
            "modalConDom": $("#add-user-modal .modal-content"),
            "url": "<?php echo url('add'); ?>"
        });

        loadPage.init({
            "clickDom": $(".btn-edit"),
            "modalConDom": $("#edit-user-modal .modal-content"),
            "url": "<?php echo url('edit'); ?>",
            "attrArr": ['id','group_ids']
        });

        <!--ajax请求-->
        $("#add-user-modal").on("click",'.add-sub',function(){
            reqAjaxJson.init({
                url: "<?php echo Url('add'); ?>",
                reqData: $('#add-form').serialize(),
                modalDom: $('#add-user-modal'),
                redirectP: "<?php echo Url('/user'); ?>"
            });
        });

        $("#edit-user-modal").on("click",'.edit-sub',function(){
            var id = $(this).data("id");
            var group_ids = $(this).data("group_ids");
            reqAjaxJson.init({
                url: "<?php echo Url('edit'); ?>?id="+id+"&group_ids="+group_ids,
                reqData: $('#edit-form').serialize(),
                modalDom: $('#edit-user-modal'),
                redirectP: "<?php echo Url('/user'); ?>"
            });
        });

        // 删除
        modelReq({
            "modalId": "#del-modal",
            "url": "<?php echo url('del'); ?>",
            "redirectP": "<?php echo Url('/user'); ?>",
            "sureClass": ".del-sub",
            "btnClass": ".btn-del"
        });
    </script>

</body>
</html>