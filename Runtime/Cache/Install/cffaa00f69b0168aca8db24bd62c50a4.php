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
        <dt>• 创建数据库</dt>
        <dd> 
        <?php
 defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_HOST_M', '127.0.0.1'); defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_PORT', '3306'); ?>
        </dd>
    </dl>
        <ul>
        <li>
            <b>数据库类型</b> 
            
            <select name="db[]">
                <option>mysql</option>
            </select>
            
            <span></span>
        </li>
        <li>
            <b>数据库服务器</b><input type="text" class="default_text" value="<?php if(defined("SAE_MYSQL_HOST_M")): echo (SAE_MYSQL_HOST_M); else: ?>127.0.0.1<?php endif; ?>" name="db[]" /><span>一般为127.0.0.1</span>
        </li>
        <li>
            <b>数据库名</b><input type="text" class="default_text" value="<?php if(defined("SAE_MYSQL_DB")): echo (SAE_MYSQL_DB); endif; ?>" name="db[]" />
        </li>
        <li>
            <b>覆盖安装</b><input type="checkbox" class="default_text" value="1" name="overcover" /><span>勾选此选项，如果同名数据库已存在，则会覆盖安装。否则会提示数据库已存在并终止安装</span>
        </li>
        <li>
            <b>数据库用户名</b><input type="text" class="default_text" value="<?php if(defined("SAE_MYSQL_USER")): echo (SAE_MYSQL_USER); endif; ?>" name="db[]" />
        </li>
        <li>
            <b>数据库密码</b><input type="password" class="default_text" value="<?php if(defined("SAE_MYSQL_PASS")): echo (SAE_MYSQL_PASS); endif; ?>" name="db[]" /><span></span>
        </li>
        <li>
            <b>数据库端口</b><input type="text" class="default_text" value="<?php if(defined("SAE_MYSQL_PORT")): echo (SAE_MYSQL_PORT); else: ?>3306<?php endif; ?>" name="db[]" /><span>一般为3306</span>
        </li>
        <li>
            <b>数据表前缀</b><input type="text" class="default_text" value="dc_" name="db[]" /><span>如果同一数据库中安装多个此项目时，建议修改后缀名，否则请使用默认后缀名。</span>
        </li>
    </ul>
    <dl>
        <dt>• 创始人帐号信息</dt>
    </dl>
    <ul>
        <li>
            <b>用户名</b><input type="text" class="default_text" value="Administrator" name="admin[]" /><span></span>
        </li>
        <li>
            <b>密码</b><input type="password" class="default_text" value="" name="admin[]" /><span></span>
        </li>
        <li>
            <b>确认密码</b><input type="password" class="default_text" value="" name="admin[]" /><span></span>
        </li>
        <li>
            <b>邮箱</b><input type="text" class="default_text" value="" name="admin[]" /><span>请填写正确的邮箱便于收取提醒邮件</span>
        </li>
    </ul>
    <a href="javascript:;" onclick="document.getElementById('installer').submit(); this.className='btn btn-success disabled pull-right'; this.onclick=''; return false;" class="btn btn-success pull-right">开始安装</a>
    </form>
</div>

        </div>
        <div class="aw-install-footer">
            <a href="http://bbs.douchat.net/" target="_blank">遇到问题? 联系我们</a> | Copyright ©  - <a href="http://douchat.net/" target="blank">豆信 3.0</a>, All Rights Reserved
        </div>
    </body>
</html>