<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\web_uploader\img.html";i:1522305566;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片上传</title>
    <link href="/static/admin/css/H-ui.reset.css" rel="stylesheet">
    <link href="/static/admin/css/H-ui.css" rel="stylesheet">

    <link href="/static/admin/css/webuploader.css" rel="stylesheet">
    <link href="/static/admin/css/uploader-style.css" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .fade {opacity: 0;
            -webkit-transition: opacity .15s linear;
            -o-transition: opacity .15s linear;
            transition: opacity .15s linear}
        .fade.in {opacity: 1}
        .modal-open {overflow: hidden}
        .modal{ position:fixed; left:0; top:0; right:0; bottom:0; z-index:1040; display:none; overflow:hidden;-webkit-overflow-scrolling:touch; outline:0}
        .modal.fade .modal-dialog{
            -webkit-transition: -webkit-transform .3s ease-out;
            -o-transition: -o-transform .3s ease-out;
            transition: transform .3s ease-out;
            -webkit-transform: translate(0,-50%);
            -ms-transform: translate(0,-50%);
            -o-transform: translate(0,-50%);
            transform: translate(0,-50%)}
        .modal.in .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0)}
        .modal-open .modal {overflow-x: hidden;overflow-y: auto}
        .modal-backdrop {position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color: #000}
        .modal-backdrop.fade {filter: alpha(opacity=0);opacity: 0}
        .modal-backdrop.in {filter: alpha(opacity=50);opacity: .5}
        .modal-dialog {position: relative;width: auto;margin: 10px}
        .modal-content{position: relative;background-color: #fff;border: 1px solid #999;border: 1px solid rgba(0,0,0,.2);outline: 0;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
            box-shadow: 0 3px 9px rgba(0,0,0,.5)}

        .modal-header {min-height: 16.42857143px;padding: 15px;border-bottom: 1px solid #eee; position:relative}
        .modal-header .close{position:absolute; right:10px; top:10px}
        .modal-header h3,.modal-header .modal-title{margin:0; padding:10px 0; font-size:16px}

        .modal-body {position:relative;padding: 15px;overflow-y:visible;word-break:break-all}
        .modal-form {margin-bottom: 0}

        .modal-footer {padding:15px;margin-bottom: 0;text-align: right;background-color: #f5f5f5;border-top: 1px solid #eee;*zoom: 1}
        .modal-footer:before,.modal-footer:after {display: table;content: ""}
        .modal-footer:after {clear: both}
        .modal-footer .btn + .btn {margin-left: 5px;margin-bottom: 0}
        .modal-footer .btn-group .btn + .btn {margin-left: -1px}
        .modal-footer .btn-block + .btn-block {margin-left: 0}

        .modal-scrollbar-measure {position: absolute;top: -9999px;width: 50px;height: 50px;overflow: scroll}

        .radius .modal-content{ border-radius:6px}
        .radius .modal-footer{ border-bottom-left-radius:6px; border-bottom-right-radius:6px}
        @media (min-width: 768px) {
            .modal-dialog {width: 600px;margin: 30px auto}
            .modal-content {-webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);box-shadow: 0 5px 15px rgba(0, 0, 0, .5)}
            .modal-sm {width: 300px}
        }
        @media (min-width: 992px) {
            .modal-lg {width: 900px}
        }

        .modal-alert{position:fixed; right:auto; bottom:auto; width:300px; left:50%;margin-left:-150px; top:50%;margin-top:-30px; z-index:9999;background-color: #fff;border: 1px solid #999;border: 1px solid rgba(0,0,0,.2);outline: 0;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
            box-shadow: 0 3px 9px rgba(0,0,0,.5)}
        .modal-alert-info{padding:30px; text-align:center; font-size:14px; background-color:#fff}

        /*#filePicker>div:nth-child(2){width:100%!important;height:100%!important;}*/
    </style>
</head>
<body>
    <button class="btn radius btn-primary size-L" onClick="modaldemo()">弹出对话框</button>

    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" data-backdrop="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">对话框标题</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void(0);">×</a>
                </div>
                <div class="modal-body">
                    <div id="uploader">
                        <div class="queueList">
                            <div id="dndArea" class="placeholder">
                                <div id="filePicker"></div>
                                <p>或将照片拖到这里，单次最多可选300张</p>
                            </div>
                        </div>
                        <div class="statusBar" style="display:none;">
                            <div class="progress">
                                <span class="text">0%</span>
                                <span class="percentage"></span>
                            </div><div class="info"></div>
                            <div class="btns">
                                <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/H-ui.js"></script>
    <script type="text/javascript" src="/static/admin/js/webuploader.js"></script>
    <script type="text/javascript" src="/static/admin/js/upload.js"></script>

    <script>
        function modaldemo() {
            $("#modal-demo").modal("show");
            // $("#modal-demo").on("shown.bs.modal",function(){
            // });
        }

    </script>
</body>
</html>