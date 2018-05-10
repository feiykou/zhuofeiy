<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\product\edit.html";i:1522675358;s:60:"F:\phpStudy\WWW\zhuo\application\admin\view\public\base.html";i:1522637302;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta name="description" content="">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>电商cms</title>
<!--引入webuploaderCss-->
<link rel="stylesheet" href="/static/admin/plugins/webuploader/webuploader.css">


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
    <link href="/static/admin/css/webuploader.css" rel="stylesheet">

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
                        添加商品
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm" data-id="<?php echo $proData['id']; ?>">
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">标题</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" name="name" type="text" value="<?php echo $proData['name']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">分类</label>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="art_cate_id">
                                            <?php if(is_array($cateArr) || $cateArr instanceof \think\Collection || $cateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $cateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                            <option value='<?php echo $data['id']; ?>' <?php if($data['id'] == $proData['art_cate_id']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat('--',$data['level'] *2); ?> <?php echo $data['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">价格</label>
                                    <div class="col-lg-1">
                                        <input class=" form-control" name="price" type="text" value="<?php echo $proData['price']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">库存量</label>
                                    <div class="col-lg-1">
                                        <input class="form-control" name="stock" type="text" value="<?php echo $proData['stock']; ?>" />
                                    </div>
                                </div>
                                <style>
                                    .radio-item span{
                                        display: inline-block;
                                        margin: 0 20px 0 3px;
                                        vertical-align: middle;
                                    }
                                    .sum-info{
                                        -webkit-box-sizing: border-box;
                                        -moz-box-sizing: border-box;
                                        box-sizing: border-box;
                                        padding: 10px;
                                        border-color: #e2e2e4;
                                    }

                                    #uploader .queueList{
                                        display: block;
                                        opacity: 1;
                                    }
                                </style>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">推荐位</label>
                                    <div class="col-lg-10 radio-item">
                                        <?php if(is_array($attribute_type) || $attribute_type instanceof \think\Collection || $attribute_type instanceof \think\Paginator): $k = 0; $__LIST__ = $attribute_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typeData): $mod = ($k % 2 );++$k;?>
                                        <label><input type="radio" style="width: 20px" value="<?php echo $k; ?>" <?php if($proData['attributes'] == $k): ?>checked<?php elseif($k==1): ?>checked<?php endif; ?> class="radio form-control" name="attributes" /><span><?php echo $typeData; ?></span></label>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">摘要</label>
                                    <div class="col-lg-10">
                                        <textarea class="sum-info" name="summary" cols="160" rows="5" placeholder="摘要信息"><?php echo $proData['summary']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">是否上架</label>
                                    <div class="col-lg-1 radio-item">
                                        <label><input type="radio" style="width: 20px" <?php if($proData['status'] == 1): ?>checked<?php endif; ?> class="radio form-control" value="0" name="status" /><span>上架</span></label>
                                        <label><input type="radio" style="width: 20px" <?php if($proData['status'] == 0): ?>checked<?php endif; ?> class="radio form-control" name="status" value="1" /><span>下架</span></label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-1">图片上传</label>
                                    <div class="col-lg-10">
                                        <div id="uploader">
                                            <div class="uploader_btns">
                                                <div id="filePicker"></div><div class="uploadBtn">开始上传</div>
                                            </div>
                                            <!--用来存放item-->
                                            <div class="queueList">
                                                <ul class="filelist filelist-exist clearfix">
                                                <?php if(is_array($proData['imgs']) || $proData['imgs'] instanceof \think\Collection || $proData['imgs'] instanceof \think\Paginator): $k = 0; $__LIST__ = $proData['imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgData): $mod = ($k % 2 );++$k;?>
                                                <li class="state-complete" data-src="<?php echo $imgData['url']; ?>">
                                                    <p class="imgWrap"><img src="<?php echo $imgData['url']; ?>" width="110" height="110"></p>
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
                                    <label class="control-label col-lg-1">排序</label>
                                    <div class="col-lg-1">
                                        <input class=" form-control" name="reorder" type="text" value="<?php echo $proData['reorder']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-1">文章编辑</label>
                                    <div class="col-lg-10">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="zhuo-container" name="content" type="text/plain" ><?php echo $proData['content']; ?></textarea>
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
    <script src="/static/admin/plugins/loading/loading-1.0.js"></script>
    <script src="/static/admin/js/zhuo-common.js"></script>
    
<script type="text/javascript" src="/static/admin/js/jquery.validate.min.js"></script>

<!--script for this page-->
<script src="/static/admin/js/messages_zh.min.js"></script>
<!--<script src="/static/admin/js/form-validation-script.js"></script>-->

<!--引入webuploaderJS-->
<script type="text/javascript" src="/static/admin/js/webuploader.js"></script><script type="text/javascript" src="/static/admin/js/uploadNew.js"></script>

<!-- 配置文件 -->
<script type="text/javascript" src="/static/admin/plugins/Ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/admin/plugins/Ueditor/ueditor.all.js"></script>

<script type="text/javascript">
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
    var pro_id = $("#signupForm").data("id");
    var url = "<?php echo url('handledit'); ?>?id="+pro_id;

    $(document).ready(function(){
        $("#signupForm").validate({
            rules: {
                name: "required",
//                main_img_url: "required",
                price: {
                    required: true,
                    min: 0,
                },
                stock: {
                    required: true,
                    min: 0,
                    digits:true
                },
                summary: 'required',
                content: "required"
            },
            messages: {
                name: "标题不能为空",
//                main_img_url: "图片不能为空",
                price: "价格必须是正数",
                stock: "库存必须是正整数",
                summary: "摘要不能为空",
                content: "内容不能为空"
            },
            submitHandler: function(form){
                // 获取图片地址
                $filelist_chids = $(".filelist > li");
                var img_str = "";
                for(var i=0;i<$filelist_chids.length;i++){
                    $li = $($filelist_chids).eq(i);
                    if($li.hasClass("state-complete")){
                        img_str += $li.data("src") + ";";
                    }
                }
                img_str = "&img_str="+img_str;
                reqAjaxJson.init({
                    'url': url,
                    'reqData': $("#signupForm").serialize()+img_str,
                    'redirectP': "<?php echo url('/product'); ?>"
                });



            }
        });
    });

    $(".filelist-exist").find("li").hover(function(){
        $(this).find(".file-panel").stop(true).animate({height:"30px"},300);
    },function(){
        $(this).find(".file-panel").stop(true).animate({height:0},300);
    });

    $(".filelist-exist").find("span.cancel").on("click",function(){
        $(this).parents("li").remove();
    });

    $(".file-img .del").on("click",function(){
        var $img = $(this).parent().find("img");
        if($img){
            $img.remove();
        }
        $fileImg.css({
            "display":'none',
        });
        $fileDom.val("");
    });


</script>




</body>
</html>