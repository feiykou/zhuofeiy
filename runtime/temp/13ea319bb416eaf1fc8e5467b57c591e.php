<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/data/www/zhuo/public/../application/admin/view/banner_item/index.html";i:1527644866;s:54:"/data/www/zhuo/application/admin/view/public/base.html";i:1526043810;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta name="description" content="">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>电商cms</title>
<style>
    .reorder input{
        width: 50px;
        height: 31px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        color: #a59e9e;
        text-align: center;
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
        
        
        
    <!--main content start-->
    <section id="main-content">
        <!--mail inbox start-->
        <aside class="lg-side form-group">
            <div class="inbox-head">
                <h3>轮播图位列表</h3>
            </div>
            <div class="inbox-body">
                <div class="mail-option">
                    <div class="col-lg-2">
                        <div class="chk-all">
                            <div class="checkbox i-checks">
                                <label>
                                    <div class="checkbox_square-green"><input type="checkbox" value="" style="position: absolute; opacity: 0;"></div>全选
                                </label>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a class="btn mini tooltips" data-placement="top" data-original-title="Refresh">
                                <i class="icon-refresh"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="javascript:;" class="btn mini selectAll-del">删除</a>
                        </div>
                    </div>
                    <form action="<?php echo url('index'); ?>" type="get">
                    <div class="col-lg-2">
                        <select class="form-control" name="banner_id">
                            <?php if(is_array($bannerArr) || $bannerArr instanceof \think\Collection || $bannerArr instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?>
                            <option value='<?php echo $banner['id']; ?>' <?php if($banner['id'] == $banner_id): ?>selected<?php endif; ?>><?php echo $banner['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn sr-btn"><i class="icon-search"></i></button>
                    </form>
                </div>
                <table class="table table-inbox table-hover">
                    <thead>
                        <tr>
                            <td class="view-message inbox-small-cells"></td>
                            <td class="view-message">id</td>
                            <td class="inbox-small-cells">名称</td>
                            <td class="view-message">图片</td>
                            <td class="view-message">跳转id</td>
                            <td class="view-message">跳转类型</td>
                            <td class="view-message">操作</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($bannerItemsData) || $bannerItemsData instanceof \think\Collection || $bannerItemsData instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerItemsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bannerItem): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $bannerItem['id']; ?>">
                            <td class="inbox-checkbox">
                                <div class="checkbox i-checks">
                                    <label>
                                        <div class="checkbox_square-green"><input type="checkbox" value="" style="position: absolute; opacity: 0;"></div>
                                    </label>
                                </div>
                            </td>
                            <td class="view-message"><?php echo $bannerItem['id']; ?></td>
                            <td class="view-message"><?php echo $bannerItem['name']; ?></td>
                            <td class="view-message art-img">
                                <?php if($bannerItem['img']['url']): ?><a href="<?php echo $bannerItem['img']['url']; ?>" target="_blank"><img src="<?php echo $bannerItem['img']['url']; ?>" width="60" height="60" alt=""></a><?php endif; ?>
                            </td>
                            <td class="view-message"><?php echo $bannerItem['key_word']; ?></td>
                            <td class="view-message"><?php echo $redic_typeArr[$bannerItem['type']]; ?></td>
                            <td class="view-message"><?php echo $bannerItem['create_time']; ?></td>
                            <td class="view-message"><span class="btn btn-primary btn-xs mr10 btn-del" data-id="<?php echo $bannerItem['id']; ?>" data-toggle="modal" data-target="#del-modal">删除</span> <a href="<?php echo url('edit',['id'=>$bannerItem['id']]); ?>" class="btn btn-primary btn-xs">编辑</a></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <nav class="paging-wrap" aria-label="...">

                </nav>
            </div>

        </aside>
        <!--mail inbox end-->
    </section>
    <!--main content end-->

    <!-- 删除弹出层 -->
    <div class="modal fade" id="del-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog cate-dialog" role="document">
            <div class="modal-content">
                <form id='cate-del-form'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'></span></button><h4 class='modal-title' >删除</h4>
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
    
<script type="text/javascript">
    $(function(){
        //全选和反选
        var $singleCheck = $(".table-inbox .checkbox_square-green");
        var $allCheck = $(".chk-all .checkbox_square-green");
        $allCheck.on("click",function(){
            if (!$(this).hasClass("checked")) {
                $singleCheck.each(function () {
                    $(this).removeClass("checked");
                });
            } else {
                $singleCheck.each(function () {
                    $(this).addClass("checked");
                });
            };
        });

        //选择事件
        $singleCheck.on("click", function () {
            var checked_len = $singleCheck.filter(".checked").length;
            var allChecked = $singleCheck.length;
            if(checked_len !== allChecked){
                $allCheck.removeClass("checked");
            }else{
                $allCheck.addClass("checked");
            }
        });

        $(".selectAll-del").on("click",function(){

            getSelectAllTr();
        });

        function getSelectAllTr(){
            $childrens = $(".table-inbox tbody").children();
            $childsArr = Array.prototype.slice.call($childrens);
            var idsArr = [];
            $childsArr.forEach(function(trDom){

                if($(trDom).find('.checkbox_square-green').hasClass("checked")){
                    idsArr.push($(trDom).data('id'));
                }
            });
            reqAjaxJson.init({
                'url': "<?php echo url('removeMoreArt'); ?>",
                'reqData': {idsArr:idsArr},
                'redirectP': "<?php echo url('/BannerItem',['banner_id'=>$banner_id]); ?>"
            });
        }



       modelReq({
           "modalId": "#del-modal",
           "url": "<?php echo url('removeArt'); ?>",
           "redirectP": "/BannerItem?banner_id="+"<?php echo $banner_id; ?>",
           "sureClass": ".cateDel-sub",
           "btnClass": ".btn-del"
       });



        

    });



</script>

</body>
</html>