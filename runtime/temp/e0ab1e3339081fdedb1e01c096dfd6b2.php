<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/data/www/zhuo/public/../application/admin/view/banner_item/edit.html";i:1528093801;s:54:"/data/www/zhuo/application/admin/view/public/base.html";i:1526043810;}*/ ?>
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
    
<!--引入webuploaderCss-->
<link href="/static/admin/lib/webuploader/webuploader.css" rel="stylesheet">
<style>
    .radio-item span{
        display: inline-block;
        margin: 0 20px 0 3px;
        vertical-align: middle;
        font-weight: normal;
    }
    .sum-info{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        border-color: #e2e2e4;
    }
</style>

</head>
<body>
    <section id="container" class="">
        
        
        
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        添加轮播图
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm">
                                <input type="hidden" name="id" value="<?php echo $bannerIdData['id']; ?>">
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">标题</label>
                                    <div class="col-lg-2">
                                        <input class=" form-control" name="name" type="text" value="<?php echo $bannerIdData['name']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">轮播图位列表</label>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="banner_id">
                                            <?php if(is_array($bannerArr) || $bannerArr instanceof \think\Collection || $bannerArr instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?>
                                            <option value='<?php echo $banner['id']; ?>' <?php if($banner['id'] == $bannerIdData['banner_id']): ?>selected<?php endif; ?>><?php echo $banner['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">id</label>
                                    <div class="col-lg-1">
                                        <input class="form-control" name="key_word" type="text" value="<?php echo $bannerIdData['key_word']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label col-lg-1">推荐位</label>
                                    <div class="col-lg-10 radio-item">
                                        <?php if(is_array($redic_typeArr) || $redic_typeArr instanceof \think\Collection || $redic_typeArr instanceof \think\Paginator): $i = 0; $__LIST__ = $redic_typeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typeArr): $mod = ($i % 2 );++$i;?>
                                        <label><input type="radio" style="width: 20px" value="<?php echo $typeArr['type']; ?>" <?php if($typeArr['type'] == $bannerIdData['type']): ?>checked<?php endif; ?> class="radio form-control" name="type" /><span><?php echo $typeArr['name']; ?></span></label>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label col-lg-1">图片上传</label>
                                    <div class="col-lg-10">
                                                    <div id="uploader" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传图片</div>
                </div>
                <!--用来存放item-->
                <div class="queueList">
                                        <ul class="filelist filelist-exist clearfix">
                                            <li class="item state-complete" data-src="<?php echo $bannerIdData['img']['url']; ?>" data-img_id="<?php echo $bannerIdData['img_id']; ?>">
                                                <p class="imgWrap"><img src="<?php echo $bannerIdData['img']['url']; ?>" width="110" height="110"></p>
                                                <div class="file-panel"><span class="cancel">删除</span></div>
                                                <span class="success"></span>
                                            </li>
                                        </ul>
                                        </div>
            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger btn-save-submit" type="button">保存</button>
                                        <button class="btn btn-default btn-clear-submit" type="button">删除</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <script src="/static/admin/lib/loading/loading-1.0.js"></script>
    <script src="/static/admin/js/zhuo-common.js"></script>
    
<script type="text/javascript" src="/static/admin/js/jquery.validate.min.js"></script>

<!--引入webuploaderJS-->
<script type="text/javascript" src="/static/admin/lib/webuploader/webuploader.js"></script><script type="text/javascript" src="/static/admin/lib/webuploader/feiy_upload.js"></script>

<script type="text/javascript">
    var config = {
        "upload_server": "<?php echo url('getSaveNameImg'); ?>",
    };

    $(".filelist-exist").parents(".queueList").css({
        'display': 'block',
        'opacity': 1
    });

    $(".filelist-exist").find("li").hover(function(){
        $(this).find(".file-panel").stop(true).animate({height:"30px"},300);
    },function(){
        $(this).find(".file-panel").stop(true).animate({height:0},300);
    });

    $(".filelist-exist").on("click","span.cancel",function(){
        $li = $(this).parents("li");
        $parents = $li.parents('.filelist-exist');
        $li.remove();
        if($parents.find("li").length == 0){
            $parents.remove();
        }
    });


    $(".btn-save-submit").on("click",function(){
        $(this).submit();
    });

    // 表单清除数据
    $(".btn-clear-submit").on("click",function(){
        $(':input','#signupForm')
            .not(':button,:submit,:reset,:hidden')   //将myform表单中input元素type为button、submit、reset、hidden排除
            .val('')  //将input元素的value设为空值
            .removeAttr('checked')
            .removeAttr('checked'); // 如果任何radio/checkbox/select inputs有checked or selected 属性，将其移除
    });


    /**
     *
     * $childsDom  元素集
     * attr        属性值
     * delimiter   分隔符
     * len         截取个数
     *
     **/
    function setUpdateUrl($childsDom,attr,delimiter,len){
        var params = "";
        var index = 0;
        delimiter = delimiter?delimiter:";"
        len = len?len:false;
        for(var i=0;i<$childsDom.length;i++){
            $li = $childsDom.eq(i);
            if($li.hasClass("state-complete")){
                index++;
                if(len && index>len){
                    break;
                }
                params += $li.data(attr) + delimiter;
            }
        }
        // 删除最后一个分隔符
        params = params.substring(0,params.length-1);
        return params;
    }

    // 图片上传
    feiy_upload.init({
        wrap:$("#uploader"),
        filePicker: $("#uploader").find(".filePicker"),
        uploadId: "#uploader",
        server: config.upload_server,
        fileNumLimit: 1
    });


    // 表单验证
    $(document).ready(function(){
        $("#signupForm").validate({
            rules: {
                name: "required",
                img_id: "required",
                key_word: {
                    required: true,
                    digits:true,
                    min:1
                },
                banner_id: 'required',
            },
            messages: {
                name: "标题不能为空",
                img_id: "图片不能为空",
                key_word: "id不能为空,不能小于1",
                banner_id: "轮播图位不能为空",
            },
            submitHandler: function(form){
                // 获取产品详情页
                var $img_list_childs = $("#uploader .filelist > li");
                var imgs_id = setUpdateUrl($img_list_childs,'img_id',",");
                if(imgs_id == 'undefined'){
                    kzLoading({
                        content:'图片不存在，或者更改图片名称重新上传'
                    });
                    return ;
                }

                params = "&img_id="+imgs_id;
                var banner_id = "<?php echo $bannerIdData['type']; ?>";
                reqAjaxJson.init({
                    url: "<?php echo Url('save'); ?>",
                    reqData: $('#signupForm').serialize()+params,
                    redirectP: "/BannerItem?banner_id="+banner_id
                });
            }
        });
    });


</script>



</body>
</html>