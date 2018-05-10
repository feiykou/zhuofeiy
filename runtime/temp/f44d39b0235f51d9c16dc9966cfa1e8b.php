<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\article\artcon.html";i:1525923036;s:60:"F:\phpStudy\WWW\zhuo\application\admin\view\public\base.html";i:1525923036;}*/ ?>
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
                        添加文章
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo Url('artAdd'); ?>" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <label for="art_title" class="control-label col-lg-1">标题</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" name="title" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="art_category_id" class="control-label col-lg-1">分类</label>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="category_id">
                                            <?php if(is_array($cateArr) || $cateArr instanceof \think\Collection || $cateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $cateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                            <option value='<?php echo $data['id']; ?>'><?php echo str_repeat('--',$data['level'] *2); ?> <?php echo $data['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="art_img_url" class="control-label col-lg-1">图片上传</label>
                                    <div class="col-lg-10">
                                        <div class="file-update">
                                            <div class="file-add">
                                                <div class="addimg_item">
                                                    <span class="addimg_line">
                                                        <i class="line-row"></i>
                                                        <i class="line-col"></i>
                                                    </span>
                                                 </div>
                                                 <input type="file" name="img_url">
                                            </div>
                                            <div class="file-img none">
                                                <span class="icon-trash del"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="clickNum" class="control-label col-lg-1">点击数</label>
                                    <div class="col-lg-1">
                                        <input class=" form-control" id="clickNum" name="click_num" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="control-label col-lg-1">文章编辑</label>
                                    <div class="col-lg-10">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="zhuo-container" name="content" type="text/plain" >
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
    <script src="/static/admin/plugins/loading/loading-1.0.js"></script>
    <script src="/static/admin/js/zhuo-common.js"></script>
    
<script type="text/javascript" src="/static/admin/js/jquery.validate.min.js"></script>

<!--script for this page-->
<script src="/static/admin/js/messages_zh.min.js"></script>
<!--<script src="/static/admin/js/form-validation-script.js"></script>-->

<!--引入webuploaderJS-->
<script type="text/javascript" src="/static/admin/plugins/webuploader/webuploader.js"></script>


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

    $(document).ready(function(){
        $("#signupForm").validate({
            rules: {
                title: "required",
                img_url: "required",
                category_id: "required",
                click_num: {
                    required: true,
                    min: 0,
                    digits:true
                },
                content: "required"
            },
            messages: {
                title: "标题不能为空",
                img_url: "图片不能为空",
                click_num: "点击数必须是正整数并且不能为空",
                content: "内容不能为空"
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });

    /*
    * 图片上传 - 飞扬
    *
    * */
    var $fileBox = $(".file-update");
    var $fileDom = $fileBox.find("input[type='file']");
    var $fileImg = $fileBox.find('.file-img');
    $fileDom.on("change",function(){
        run(this,function(result){
            var $img = new Image();
            $img.width = 120;
            $img.height = 120;
            $img.src = result;
            $fileImg.append($img);
            $fileImg.css({
                "display":'block',
            });
        });
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


    /**
     *
     * @param input_file   文件按钮对象
     * @param get_data     转换成功后执行的方法
     * @returns {boolean}
     */
    function run(input_file,get_data){
        if ( typeof(FileReader) === 'undefined' ){
            alert("抱歉，你的浏览器不支持 FileReader，不能将图片转换为Base64，请使用现代浏览器操作！");
        } else {
            try{
                /*图片转Base64 核心代码*/
                var file = input_file.files[0];
                console.log(file);
//                var file = input_file;
                if(!/image\/\w+/.test(file.type)){
                    alert("请确保文件为图像类型");
                    return false;
                }
                var reader = new FileReader();
                reader.onload = function(){
                    get_data(this.result);
                }
                reader.readAsDataURL(file);
            }catch (e){
                alert('图片转Base64出错啦！'+ e.toString())
            }
        }
    }
</script>




</body>
</html>