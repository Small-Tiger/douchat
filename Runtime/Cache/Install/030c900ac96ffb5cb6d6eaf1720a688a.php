<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
        <title>豆信安装</title>
        <link href="/Public/Install/css/bootstrap.css" rel="stylesheet" type="text/css" />
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
        <dt>• 正在<?php if(($_SESSION['update']) == "1"): ?>升级<?php else: ?>安装<?php endif; ?>，请稍后...</dt>
        <dd> 
        <div id="show-list" class="install-database">
        </div>
        </dd>
    </dl>
    </form>
</div>

        </div>
        <div class="aw-install-footer">
            <a href="http://bbs.douchat.net/" target="_blank">遇到问题? 联系我们</a> | Copyright ©  - <a href="http://douchat.net/" target="blank">豆信 3.0</a>, All Rights Reserved
        </div>
    <script type="text/javascript">
        var list   = document.getElementById('show-list');
        function showmsg(msg, classname){
            var li = document.createElement('p'); 
            li.innerHTML = msg;
            classname && li.setAttribute('class', classname);
            list.appendChild(li);
            document.scrollTop += 30;
        }
    </script>
    </body>
</html>