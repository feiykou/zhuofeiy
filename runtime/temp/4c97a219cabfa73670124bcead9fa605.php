<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\user\edit.html";i:1522113810;}*/ ?>
<form id="edit-form">
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'></span></button><h4 class='modal-title' id='exampleModalLabel'>添加管理员</h4>
    </div>
    <div class='modal-body'>
        <div class='form-group'>
            <label class='control-label'>用户名</label>
            <input type='text' class='form-control' name='name' value="<?php echo $userData['name']; ?>">
        </div>
        <div class='form-group'>
            <label class='control-label'>密码</label>
            <input type='password' class='form-control' name='passwords' value="<?php echo $userData['passwords']; ?>">
        </div>
        <?php if($userData['name'] != 'admin'): ?>
        <div class='form-group '>
            <label class='control-label'>角色</label>
            <div class="user-role-checked">
                <?php if(!empty($groupsData)): if(is_array($groupsData) || $groupsData instanceof \think\Collection || $groupsData instanceof \think\Paginator): $i = 0; $__LIST__ = $groupsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <label>
                    <input name="groups_id[]" value="<?php echo $data['id']; ?>" <?php if(in_array($data['id'],$group_sel_arr)): ?>checked<?php endif; ?> class="inverted" type="checkbox">
                    <span class="text"><?php echo $data['title']; ?></span>
                </label>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <a href="<?php echo url('/role'); ?>">请添加角色</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
        <button type='button' class='btn btn-primary edit-sub' data-id="<?php echo $userData['id']; ?>" data-group_ids="<?php echo $userData['group_ids']; ?>">提交</button>
    </div>
</form>