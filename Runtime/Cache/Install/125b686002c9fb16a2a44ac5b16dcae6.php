<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <title>豆信安装</title>
    <link href="/Public/Install/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/Public/Install/css/install.css">
</head>
<body>
    <div class="aw-install">
        <div class="aw-mod-head">
            <img src="/Public/Install/img/logo.png" alt="">
        </div>
        <div class="aw-mod-body">
        <form action="" method="post" id="installer">
        <input type="hidden" name="step" value="2">
            <dl>
                <dt>• 欢迎使用</dt>
                <dd>欢迎使用 豆信 安装程序, 豆信 是一个简洁、高效的微信公众号开发框架</dd>
            </dl>
            <dl>
                <dt>• 运行环境检查</dt>
                <dd></dd>
            </dl>
                <ul>
                <?php if(is_array($env)): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                    <b><?php echo ($item[0]); ?></b><span><?php echo ($item[1]); ?></span><span><?php echo ($item[3]); ?></span><span class="green"><?php if ($item[4] == 'success') { echo '√'; } else { echo 'x'; } ?></if></span>       
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
            <dl>
                <dt>• 依赖性</dt>
                <dd></dd>
            </dl>
                <ul>
                <?php if(is_array($func)): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                    <b><?php echo ($item[0]); ?></b><span><?php echo ($item[3]); ?></span><span><?php echo ($item[1]); ?></span><span class="green"><?php if ($item[2] == 'success') { echo '√'; } else { echo 'x'; } ?></if></span>       
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
            <dl>
                <dt>• 目录、文件权限检查</dt>
                <dd></dd>
            </dl>
                <ul>
                <?php if(is_array($dirfile)): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                    <b><?php echo ($item[3]); ?></b><span></span><span><?php echo ($item[1]); ?></span><span class="green"><?php if ($item[2] == 'success') { echo '√'; } else { echo 'x'; } ?></if></span>       
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
            <a class="btn btn-success pull-right" href="<?php echo U('Install/step2');?>">下一步</a>
             </form>
        </div>

        </div>
        <div class="aw-install-footer">
            <a href="http://bbs.douchat.net/" target="_blank">遇到问题? 联系我们</a> | Copyright ©  - <a href="http://douchat.net/" target="blank">豆信 3.0</a>, All Rights Reserved
        </div>
</body>
</html>