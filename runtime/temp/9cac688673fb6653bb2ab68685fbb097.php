<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\webuploader\img_btn.html";i:1522393911;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片上传</title>

    <link href="/static/admin/css/webuploader.css" rel="stylesheet">
    <link href="/static/admin/css/uploader-style.css" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .btns{
            display: block;
            overflow: hidden;
        }
        .uploadBtn,.btns .webuploader-pick{
            float: left;
            background: #ffffff;
            border: 1px solid #cfcfcf;
            color: #565656;
            padding: 0 15px;
            display: inline-block;
            border-radius: 3px;
            margin-right: 10px;
            cursor: pointer;
            font-size: 14px;
            line-height: 26px;
        }

        .btns .webuploader-pick-hover{
            background: #f0f0f0;
        }
        .uploadBtn{
            background: #00b7ee;
            color: #fff;
            border-color: transparent;
        }
        .uploadBtn:hover{
            background: #00a2d4;
        }
    </style>
</head>
<body>
<div id="uploader">
    <div class="btns">
        <div id="filePicker"></div><div class="uploadBtn">开始上传</div>
    </div>
    <!--用来存放item-->
    <div class="queueList"></div>
</div>

<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/static/admin/js/webuploader.js"></script>
<script type="text/javascript" src="/static/admin/js/uploadNew.js"></script>

<script>

</script>
</body>
</html>