<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\cate\add.html";i:1525940645;}*/ ?>
<form id='cate-add-form'>
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'></span></button><h4 class='modal-title' id='exampleModalLabel'>编辑分类</h4>
    </div>
    <div class='modal-body'>
        <div class='form-group'>
            <label for='recipient-name' class='control-label'>分类名称</label>
            <input type='text' class='form-control' name='name' value=''>
        </div>
        <div class='form-group '>
            <label for='recipient-name' class='control-label'>分类</label>
            <select class='form-control' name='pid'>
                <option value='0'>顶级分类</option>
                <?php if(is_array($cateArr) || $cateArr instanceof \think\Collection || $cateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $cateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <option value='<?php echo $data['id']; ?>'><?php echo str_repeat('--',$data['level'] *2); ?> <?php echo $data['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
        <button type='button' class='btn btn-primary cateAdd-sub'>提交</button>
    </div>
</form>