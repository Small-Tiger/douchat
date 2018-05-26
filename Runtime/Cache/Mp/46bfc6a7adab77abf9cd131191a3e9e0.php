<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
<meta name="format-detection" content="telephone=no" />
<title><?php echo ($meta_title); ?>-<?php echo ($system_settings['site_name']); ?></title>
<meta name="keywords" content="<?php echo ($settings['site_keywords']); ?>" />
<meta name="description" content="<?php echo ($settings['site_intro']); ?>" />
<script type="text/javascript">
    var upload_path = "<?php echo U('Mp/Material/upload');?>";
    var get_image_list_url = "<?php echo U('Mp/Material/get_image_list');?>";
    var delete_attach_url = "<?php echo U('Mp/Material/delete_attach');?>";
    var _this_ele_name = '';
</script>
<link type="text/css" rel="stylesheet" href="/Public/Common/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="/Public/Common/css/icon.css" />
<link rel="stylesheet" type="text/css" href="/Public/Common/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="/Public/Admin/css/common.css" />
<script type="text/javascript" src="/Public/Common/js/jquery.js" ></script>
<script type="text/javascript" src="/Public/Common/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/framework.js" ></script>
<script type="text/javascript" src="/Public/Admin/js/global.js" ></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="/Public/Common/js/respond.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Plugins/webuploader/css/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/Public/Plugins/webuploader/css/style.css" />
<script type="text/javascript" src="/Public/Plugins/webuploader/js/webuploader.js"></script>
<script type="text/javascript" src="/Public/Plugins/webuploader/js/upload.js"></script>
<!-- <script type="text/javascript" src="/Public/Plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Plugins/ueditor/ueditor.all.min.js"></script> -->
<!-- <script type="text/javascript" src="/Public/Plugins/editormd/js/editormd.min.js"></script>
<link rel="stylesheet" href="/Public/Plugins/editormd/css/editormd.css" /> -->

<link rel="stylesheet" type="text/css" href="/Public/Mp/css/custom_menu.css" />

</head>

<body>
    <div id="modal-wechat-webuploader" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; padding-right: 17px;">
        <div class="modal-dialog" style="width:700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <ul class="nav nav-pills" role="tablist">
                        <li id="li_upload_perm" data-mode="perm" class="active" role="presentation">
                            <a href="#wechat_upload" aria-controls="wechat_upload" role="tab" data-toggle="tab">上传图片</a>
                        </li>
                        <!-- <li id="li_upload_temp" data-mode="temp" role="presentation">
                            <a href="#wechat_upload" aria-controls="wechat_upload" role="tab" data-toggle="tab">上传临时图片(保留3天)</a>
                        </li> -->
                        <li id="li_history_image" class="" role="presentation">
                            <a href="#wechat_history_image" aria-controls="wechat_history_image" role="tab" data-toggle="tab">浏览图片</a>
                        </li>
                        <!-- <li id="li_history_audio" class="hide" role="presentation">
                            <a href="#wechat_history_audio" aria-controls="wechat_history_audio" role="tab" data-toggle="tab">浏览音频</a>
                        </li>
                        <li id="li_history_video" class="hide" role="presentation"><a href="#wechat_history_video" aria-controls="wechat_history_video" role="tab" data-toggle="tab">浏览视频</a></li> -->
                    </ul>
                </div>
                <div class="modal-body tab-content">
                    <div role="tabpanel" class="tab-pane history" id="wechat_history_image">
                        <div class="history-content" style="height:330px">
                            <ul class="img-list clearfix">
                            </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <div style="float: left;" class="pagination">
                            </div>
                            <div style="float: right;">
                                <button style="display:none;" type="button" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane upload active" id="wechat_upload">
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
                                    <div id="filePicker2"></div><div class="uploadBtn">确定使用</div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>

<div  class="aw-header">
    <button class="btn btn-sm mod-head-btn pull-left">
        <i class="icon icon-bar"></i>
    </button>

    <div class="mod-header-user">
        <ul class="pull-left">
            <li class="dropdown mp">
                <?php if($mp_info['origin_id']): ?><a href="#" class="dropdown-toggle mod-bell" data-toggle="dropdown">
                    <img src="<?php if($mp_info['headimg']): echo ($mp_info['headimg']); else: ?>/Public/Admin/img/noname.jpg<?php endif; ?>" class="img-circle" width="30" height="30" style="position:relative;top:8px;">
                    <?php echo ($mp_info['name']); ?>
                    <span class="caret"></span>
                </a>
                <?php else: ?>
                <a href="#" class="dropdown-toggle mod-bell" data-toggle="">
                    <img src="/Public/Admin/img/noname.jpg" class="img-circle" width="30" height="30" style="position:relative;top:8px;">
                    <?php if($_G['module'] == 'admin'): ?>系统管理后台
                    <?php else: ?>
                    请选择账号<?php endif; ?>
                </a><?php endif; ?>
                <ul class="dropdown-menu mod-user">
                    <!--<li>-->
                        <!--<a href="<?php echo U('Mp/Index/index', ['mpid'=>$mp_info['id']]);?>"><i class="icon icon-home"></i>管理当前账号</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="<?php echo U('Mp/Mp/edit', ['id'=>$mp_info['id'], 'mp_type'=>$mp_info['mp_type']]);?>"><i class="icon icon-edit"></i>编辑当前账号</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="<?php echo U('Mp/Mp/lists', ['mp_type'=>$mp_info['mp_type']]);?>"><i class="icon icon-ul"></i>管理其他账号</a>-->
                    <!--</li>-->
                    <?php if(is_array($mp_list)): $i = 0; $__LIST__ = $mp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('Mp/Index/index', ['mpid'=>$vo['id']]);?>"><?php echo ($vo["name"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
            <?php if(is_array($topnav)): $i = 0; $__LIST__ = $topnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="top-menu"> 
                <a href="<?php echo ($vo["url"]); ?>" class="<?php echo ($vo["class"]); ?>"><?php echo ($vo["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
       <!--  <?php if($mp_info): ?><a href="<?php echo U('Mp/Index/index', array('mpid'=>$mp_info['id']));?>"><?php echo ($mp_info['name']); ?></a><?php endif; ?> -->
        <ul class="pull-right">
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle mod-bell" data-toggle="dropdown">
                    <i class="icon icon-bell"></i>
                    <span class="label label-danger">1</span>
                </a>
                <ul class="dropdown-menu mod-chat">
                    <div class="mod-list-head">
                        您有 1 条消息                    
                    </div>
                    <li class="mod-media">
                        <a href="http://bbs.douchat.net" target="_blank">
                            豆信体验反馈
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown username">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php if($user_info['headimg']): echo ($user_info['headimg']); else: ?>/Public/Admin/img/noname.jpg<?php endif; ?>" class="img-circle" width="30" height="30" style="position:relative;top:8px;">
                    <?php if($user_info['nickname'] != ''): echo ($user_info['nickname']); else: echo ($user_info['username']); endif; ?>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu pull-right mod-user">
                    <li>
                        <a href="<?php echo U('Home/Index/index');?>" target="_blank"><i class="icon icon-home"></i>首页</a>
                    </li>

                    <li>
                        <a href="<?php echo U('Mp/User/profile');?>"><i class="icon icon-ul"></i>个人资料</a>
                    </li>

                    <li>
                        <a href="<?php echo U('User/Public/login_out');?>"><i class="icon icon-logout"></i>退出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div id="aw-ajax-box" class="aw-ajax-box">
    <div id="aw-loading" class="hide" style="display: none;">
        <div id="aw-loading-box"></div>
    </div>
    <div class="modal fade alert-box aw-tips-box in" aria-hidden="false" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">提示信息</h3>
                </div>
                <div class="modal-body">
                    <p>提示内容</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade in" style="display:none"></div>
<div class="aw-side" id="aw-side">
    <div class="mod">
        <div class="mod-logo">
            <img class="pull-left" src="/Public/Admin/img/logo.png" alt="" />
            <h1>豆信</h1>
        </div>

        <div class="mod-message">
            <div class="message">
                <a class="btn btn-sm" href="<?php echo U('Home/Index/index');?>" target="_blank" title="网站首页">
                    <i class="icon icon-home"></i>
                </a>

                <a class="btn btn-sm" href="<?php echo U('Mp/Index/index');?>" title="首页">
                    <i class="icon icon-ul"></i>
                </a>

                <a class="btn btn-sm" href="<?php echo U('User/Public/login_out');?>" title="退出登录">
                    <i class="icon icon-logout"></i>
                </a>
            </div>
        </div>

        
        <?php if(is_array($sidenav)): $i = 0; $__LIST__ = $sidenav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="mod-bar" >
            <li>
                <a href="<?php echo ($vo["url"]); ?>" class="<?php echo ($vo["class"]); ?>" <?php echo ($vo["attr"]); ?>>
                    <span><?php echo ($vo["title"]); ?></span>
                </a>
                <!-- <ul <?php if(CONTROLLER_NAME != 'Addons'): ?>class="hide"<?php endif; ?>> -->
                <ul>
                    <?php if(is_array($vo["children"])): $i = 0; $__LIST__ = $vo["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo ($vv["url"]); ?>" class="<?php echo ($vv["class"]); ?>">
                            <span><?php echo ($vv["title"]); ?></span>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        
    </div>
</div>

<script type="text/javascript">
var path_info = "<?php echo $_SERVER['PATH_INFO']; ?>";
var controller = "<?php echo CONTROLLER_NAME; ?>";        // 获取当前控制器
var addon = "<?php echo get_addon();?>";
if (controller == 'Web') {
    if (addon) {
        var active_a = $("#aw-side a[href*='"+addon+"']");
    } else {
        var active_a = $("#aw-side a[href*='"+path_info+"']");
    }
} else {
    var active_a = $("#aw-side a[href*='"+controller+"']");              // 获取链接中包含当前控制器的a标签
}

active_a = $('#aw-side a[class="active"]');
var active_ul = active_a.parent("li").parent("ul");         // 获取需要显示的ul标签
var active_wrap = active_ul.siblings("a");

active_a.addClass("active");
active_ul.removeClass("hide");
active_wrap.addClass("active");

</script>



<div class="aw-content-wrap">

    <?php if($crumb): ?><ol class="breadcrumb">
	<?php if(is_array($crumb)): $i = 0; $__LIST__ = $crumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><?php if(!empty($vo["url"])): ?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a><?php else: echo ($vo["title"]); endif; ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ol><?php endif; ?>

    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a <?php if(!empty($vo["url"])): ?>href="<?php echo ($vo["url"]); ?>"<?php endif; ?>><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
            </h3>
        </div>
        <div class="mod-body tab-content">
            <div class="tab-pane active" id="list">
            <?php if($tip): ?><div class="alert alert-info tip" role="alert"><?php echo ($tip); ?></div><?php endif; ?>
            <?php if($subnav): ?><ul class="nav nav-tabs">
                <?php if(is_array($subnav)): $i = 0; $__LIST__ = $subnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li role="presentation" class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul> 
            <br><?php endif; ?>
            <div class="mod-table-head">
                <?php if($add_button): ?><a class="btn btn-primary" href="<?php echo U('add');?>">添加<?php echo ($model['title']); ?></a><?php endif; ?>
                <?php if($del_button): ?><a class="btn btn-danger del-btn" href="javascript:;">删除<?php echo ($model['title']); ?></a><?php endif; ?>
                <?php if(is_array($btn)): $i = 0; $__LIST__ = $btn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>" <?php echo ($vo["attr"]); ?>><?php echo ($vo["title"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
                <div class="conditionMenu" id="conditionMenuDesigner">
                    <div class="app clearfix">
                        <div class="app-preview">
                            <div class="app-header"></div>
                            <div class="app-content">
                                <div class="inner">
                                    <div class="title">
                                        <h1><span class="ng-binding">默认菜单</span></h1>
                                    </div>
                                </div>
                                <div class="nav-menu">
                                    <div class="js-quickmenu nav-menu-wx clearfix has-nav-1">
                                    <ul class="nav-group designer-x ui-sortable">
                                        <li class="nav-group-item js-not-sortable ng-scope add-button">
                                            <a href="javascript:void(0);" title="拖动排序" class="ng-binding">
                                                <i class="fa fa-plus-circle"></i>
                                                添加菜单
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-side">
                        <div class="menu app-conditionMenu-edit">
                            <div class="arrow-left"></div>
                            <div class="inner">
                                <div class="panel panel-default">
                                    <div class="panel-body form-horizontal">
                                        <div class="conditionMenu-wx">
                                            <div class="card">
                                                <div class="nav-region">
                                                    <div class="first-nav">
                                                        <h3>基本设置</h3>
                                                        <div class="alert">
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-2">菜单标题</label>
                                                                <div class="col-xs-10">
                                                                    <input type="text" class="form-control" value="默认菜单" name="menu_name" disabled="true">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="conditionMenu-wx" style="display:none">
                                            <div class="card">
                                                <div class="nav-region">
                                                    <div class="first-nav">
                                                        <h3>个性化</h3>
                                                        <div class="alert">
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-2">性别</label>
                                                                <div class="col-xs-10">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="0" class="ng-pristine ng-untouched ng-valid" name="sex" checked> 不限
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="1" class="ng-pristine ng-untouched ng-valid" name="sex"> 男
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="2" class="ng-pristine ng-untouched ng-valid" name="sex"> 女
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group fans-group">
                                                                <label class="control-label col-xs-2">粉丝分组</label>
                                                                <div class="col-xs-10">
                                                                    <label class="radio-inline"><input type="radio" name="group" value="-1" class="ng-pristine ng-untouched ng-valid" checked> 不限</label>
                                                                    <label class="radio-inline"><input type="radio" name="group" value="0" class="ng-pristine ng-untouched ng-valid"> 未分组</label>
                                                                    <label class="radio-inline"><input type="radio" name="group" value="1" class="ng-pristine ng-untouched ng-valid"> 黑名单</label>
                                                                    <label class="radio-inline"><input type="radio" name="group" value="2" class="ng-pristine ng-untouched ng-valid"> 星标组</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-2">客户端</label>
                                                                <div class="col-xs-10">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="0" class="ng-pristine ng-untouched ng-valid" name="client_platform_type" checked> 不限
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="1" class="ng-pristine ng-untouched ng-valid" name="client_platform_type"> IOS(苹果)
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="2" class="ng-pristine ng-untouched ng-valid" name="client_platform_type"> Android(安卓)
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" value="3" class="ng-pristine ng-untouched ng-valid" name="client_platform_type"> Others(其他)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-2">地区限制</label>
                                                                <div class="col-xs-10">
                                                                    <div style="margin-top:15px">
                                                                    <div class="row row-fix tpl-district-container">
                                                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                            <select name="country" class="form-control tpl-province ng-pristine ng-untouched ng-valid">
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                            <select name="province" class="form-control tpl-city ng-pristine ng-untouched ng-valid">
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                            <select name="city" class="form-control tpl-city ng-pristine ng-untouched ng-valid">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div style="margin-top:15px"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card ng-scope" id="menu_info" data-id="">
                                            <div class="btns">
                                                <a id="deleteMenu" href="javascript:;"><i class="fa fa-times"></i></a>
                                            </div>
                                            <div class="nav-region">
                                                <div class="first-nav">
                                                    <h3>菜单设置</h3>
                                                    <div class="alert">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-2">菜单名称</label>
                                                            <div class="col-xs-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="" name="menu_name">
                                                                    <!-- <div class="input-group-btn">
                                                                        <span class="btn btn-primary"><i class="fa fa-github-alt"></i> 添加表情</span>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ng-scope extra">
                                                            <label class="control-label col-xs-2">菜单动作</label>
                                                            <div class="col-xs-10 menu-action">
                                                                <span>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="menu_type" value="view" class="ng-pristine ng-untouched ng-valid"> 链接
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="menu_type" value="click" class="ng-pristine ng-untouched ng-valid"> 触发关键字
                                                                    </label>
                                                                   
                                                                </span>
                                                               
                                                                <div class="menu_act" style="display:none">
                                                                    <hr>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text">
                                                                        <!-- <div class="input-group-btn">
                                                                            <button class="btn btn-primary"><i class="fa fa-external-link"></i>操作</button>
                                                                        </div> -->
                                                                    </div>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                
                                                            </div>
                                                        </div><!-- end ngIf: context.activeType == 2 || (context.activeType == 1 && context.activeItem.sub_button.length == 0) -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end ngIf: context.group.button.length > 0 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-preview col-xs-12 col-sm-9 col-lg-10">
                    <div class="text-center alert alert-warning" style="background:#faebcc;margin-top:-40px;">
                        <span class="btn btn-primary ng-binding" id="btn-submit">发布菜单</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="aw-footer">
    <p><?php echo ($system_settings['site_copyright']); ?> - Powered By <a href="http://douchat.net/" target="blank">豆信</a></p>
</div>

<!-- DO NOT REMOVE -->
<div id="aw-ajax-box" class="aw-ajax-box"></div>


<div style="display:none;" id="__crond">
	<script type="text/javascript">
		$(document).ready(function () {
			//$('#__crond').html(unescape('%3Cimg%20src%3D%22' + G_BASE_URL + '/crond/run/1459163416%22%20width%3D%221%22%20height%3D%221%22%20/%3E'));
		});
	</script>
</div>

<script type="text/javascript" src="/Public/Admin/js/common.js"></script>

<!-- ueditor 编辑器 -->
<script type="text/javascript">
    // var ue = UE.getEditor('ueditor');
</script>

<!-- markdown 编辑器 -->
<script type="text/javascript">
var testEditor;
$(function() {
    // testEditor = editormd("test-editormd", {
    //     width   : "99%",
    //     height  : 640,
    //     syncScrolling : "single",
    //     path    : "/Public/Plugins/editormd/lib/",
    //     imageUpload : true,
    //     imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
    //     imageUploadURL : "<?php echo U('Material/markdown_picupload',array('test'=>123456));?>",
    // });
});
</script>

<script type="text/javascript">
    var get_menu_url = "<?php echo U('get_menu');?>";
    var create_menu_url = "<?php echo U('create_menu');?>";
    var delete_menu_url = "<?php echo U('delete_menu');?>";
</script>
<script type="text/javascript" src="/Public/Mp/js/custom_menu.js"></script>

</body>
</html>