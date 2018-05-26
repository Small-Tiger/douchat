<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
        <title>豆信安装</title>
        <link href="/Public/Common/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/Public/Install/css/install.css" />
    </head>
    <body>
        
        <div class="aw-install">
            <div class="aw-mod-head">
                <img src="/Public/Install/img/logo.png" alt="" />
            </div>
<div class="aw-mod-body">
    <form action="" method="post" id="installer">
    <input type="hidden" name="step" value="3" />
    <dl>
        <dt>• <?php if(($_SESSION['update']) == "1"): ?>升级<?php else: ?>安装<?php endif; ?>完成！</dt>
        <dd> 
        <?php echo ($info); ?>
        </dd>
        <dt>为了安全起见，请删除App/Install目录！</dt>
    </dl>
    <a class="btn btn-success pull-right" href="<?php echo U('User/Public/login');?>">登录管理中心</a>
    </form>
</div>

        </div>
        <div class="aw-install-footer">
            <a href="http://bbs.douchat.net/" target="_blank">遇到问题? 联系我们</a> | Copyright ©  - <a href="http://douchat.net/" target="blank">豆信 3.0</a>, All Rights Reserved
        </div>
    </body>
</html>