<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\webuploader\img_new.html";i:1522386701;}*/ ?>
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

    </style>
</head>
<body>
    <button class="btn radius btn-primary size-L" onClick="modaldemo()">弹出对话框</button>
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
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/H-ui.js"></script>
    <script type="text/javascript" src="/static/admin/js/webuploader.js"></script>
    <script type="text/javascript" src="/static/admin/js/uploadNew.js"></script>

    <script>

    </script>
</body>
</html>