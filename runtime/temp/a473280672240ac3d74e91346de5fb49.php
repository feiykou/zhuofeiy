<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\SoftDownload\wamp\www\zhuo\public/../application/admin\view\article\edit.html";i:1526132888;s:69:"D:\SoftDownload\wamp\www\zhuo\application\admin\view\public\base.html";i:1526130479;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta name="description" content="">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>电商cms</title>
<!--引入webuploaderCss-->
<link href="/static/admin/lib/webuploader/webuploader.css" rel="stylesheet">


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
                    <header class="panel-heading">
                        编辑文章
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo Url('artEditUpdate',['id'=>$artData['id']]); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $artData['id']; ?>">
                                <div class="form-group ">
                                    <label for="art_title" class="control-label col-lg-1">标题</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" name="name" type="text" value="<?php echo $artData['name']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="art_category_id" class="control-label col-lg-1">分类</label>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="category_id">
                                            <option value='0'>顶级分类</option>
                                            <?php if(is_array($cateArr) || $cateArr instanceof \think\Collection || $cateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $cateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                            <option value='<?php echo $data['id']; ?>' <?php if($data['id'] == $artData['category_id']): ?> selected="selected"<?php endif; ?>><?php echo str_repeat('--',$data['level'] *2); ?> <?php echo $data['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="art_img_url" class="control-label col-lg-1">图片上传</label>
                                    <div class="col-lg-10">
                                                    <div id="uploader" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传缩略图</div>
                </div>
                <!--用来存放item-->
                <div class="queueList">
                                        <ul class="filelist filelist-exist clearfix">
                                            <?php if(is_array($imgUrlArr) || $imgUrlArr instanceof \think\Collection || $imgUrlArr instanceof \think\Paginator): $i = 0; $__LIST__ = $imgUrlArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_url): $mod = ($i % 2 );++$i;?>
                                            <li class="item state-complete" data-src="<?php echo $img_url['url']; ?>" data-img_id="<?php echo $img_url['id']; ?>">
                                                <p class="imgWrap"><img src="<?php echo $img_url['url']; ?>" width="110" height="110"></p>
                                                <div class="file-panel"><span class="cancel">删除</span></div>
                                                <span class="success"></span>
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                        </div>
            </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="clickNum" class="control-label col-lg-1">点击数</label>
                                    <div class="col-lg-1">
                                        <input class=" form-control" id="clickNum" name="click_num" type="text" value="<?php echo $artData['click_num']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="control-label col-lg-1">文章编辑</label>
                                    <div class="col-lg-10">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="zhuo-container" name="content" type="text/plain" style="width: 100%; height: 350px; overflow-y:auto; ">
                                            <?php echo html_entity_decode($artData['content']); ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger btn-save-submit" type="button">Save</button>
                                        <button class="btn btn-default btn-clear-submit" type="button">Cancel</button>
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

<!--script for this page-->
<script src="/static/admin/js/messages_zh.min.js"></script>
<!--<script src="/static/admin/js/form-validation-script.js"></script>-->

<!--引入webuploaderJS-->
<script type="text/javascript" src="/static/admin/lib/webuploader/webuploader.js"></script><script type="text/javascript" src="/static/admin/lib/webuploader/feiy_upload.js"></script>

<!-- 配置文件 -->
<script type="text/javascript" src="/static/admin/lib/Ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/admin/lib/Ueditor/ueditor.all.js"></script>

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
    //注意：设置编辑器属性要在初始化编辑器之前设置，否则无效果
    window.UEDITOR_CONFIG.initialFrameHeight = 560; //设置编辑框的高度
    //设置编辑器高度不自动加高
    window.UEDITOR_CONFIG.autoHeightEnabled=false;
    //禁止显示元素路径
    window.UEDITOR_CONFIG.elementPathEnabled = false;
    //实例化编辑器
    var ue = UE.getEditor('zhuo-container');



    $(".btn-save-submit").on("click",function(){
        $(this).submit();
    });

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

    $(document).ready(function(){
        $("#signupForm").validate({
            rules: {
                name: "required",
                category_id: "required",
                click_num: {
                    required: true,
                    min: 0,
                    digits:true
                },
                content: "required"
            },
            messages: {
                name: "标题不能为空",
                click_num: "点击数必须是正整数并且不能为空",
                content: "内容不能为空"
            },
            submitHandler: function(form){
                // 获取产品详情页
                var $img_list_childs = $("#uploader .filelist > li");
                var imgs_url = setUpdateUrl($img_list_childs,'src','',1);
                var imgs_id = setUpdateUrl($img_list_childs,'img_id',",");
                params = "&img_url="+imgs_url+"&img_id="+imgs_id;
                console.log(params);
                reqAjaxJson.init({
                    url: "<?php echo Url('save'); ?>",
                    reqData: $('#signupForm').serialize()+params,
                    redirectP: "/artlist"
                });
            }
        });
    });


    feiy_upload.init({
        wrap:$("#uploader"),
        filePicker: $("#uploader").find(".filePicker"),
        uploadId: "#uploader",
        server: config.upload_server,
        fileNumLimit: 3
    });



</script>




</body>
</html>