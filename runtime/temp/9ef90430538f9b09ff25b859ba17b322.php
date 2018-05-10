<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\auth_rule\add.html";i:1522113810;}*/ ?>
<form id="add-form">
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'></span></button><h4 class='modal-title' id='exampleModalLabel'>添加管理员</h4>
    </div>
    <div class='modal-body'>
        <div class='form-group'>
            <label class='control-label'>权限名</label>
            <input type='text' class='form-control' name='title'>
        </div>
        <div class='form-group'>
            <label class='control-label'>链接</label>
            <input type='text' class='form-control' name='name'>
        </div>
        <div class='form-group '>
            <label class='control-label'>父级权限</label>
            <select class='form-control' name='pid'>
                <option value='0'>顶级权限</option>
                <?php if(is_array($sortData) || $sortData instanceof \think\Collection || $sortData instanceof \think\Paginator): $i = 0; $__LIST__ = $sortData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $data['id']; ?>"><?php echo str_repeat('-',$data['level'] *3); ?><?php echo $data['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
        <button type='button' class='btn btn-primary add-sub'>提交</button>
    </div>
</form>