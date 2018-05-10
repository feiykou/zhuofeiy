<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"F:\phpStudy\WWW\zhuo\public/../application/admin\view\user\add.html";i:1522207292;}*/ ?>
<form id="add-form">
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'></span></button><h4 class='modal-title' id='exampleModalLabel'>添加管理员</h4>
    </div>
    <div class='modal-body'>
        <div class='form-group'>
            <label class='control-label'>用户名</label>
            <input type='text' class='form-control' name='name'>
        </div>
        <div class='form-group'>
            <label class='control-label'>密码</label>
            <input type='text' class='form-control' name='passwords'>
        </div>
        <div class='form-group '>
            <label class='control-label'>角色</label>
            <div class="user-role-checked">
                <?php if(is_array($roleDatas) || $roleDatas instanceof \think\Collection || $roleDatas instanceof \think\Paginator): $i = 0; $__LIST__ = $roleDatas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <label>
                    <input name="groups_id[]" value="<?php echo $data['id']; ?>" class="inverted" type="checkbox">
                    <span class="text"><?php echo $data['title']; ?></span>
                </label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!--<select class='form-control' name='group_id'>-->
                <!--<?php if(is_array($roleDatas) || $roleDatas instanceof \think\Collection || $roleDatas instanceof \think\Paginator): $i = 0; $__LIST__ = $roleDatas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>-->
                    <!--<option value="<?php echo $data['id']; ?>"><?php echo $data['title']; ?></option>-->
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
            <!--</select><?php if($roleDatas == []): ?><span style='display: inline-block; padding-top: 6px; color: #ff6c60;'>请添加角色</span><?php endif; ?>-->
        </div>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
        <button type='button' class='btn btn-primary add-sub'>提交</button>
    </div>
</form>