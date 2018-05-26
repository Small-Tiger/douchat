<?php 

namespace Admin\Model;
use Think\Model;

/**
 * 插件模型
 * @author 艾逗笔<765532665@qq.com>
 */
class AddonsModel extends Model {

	/**
	 * 自动验证
	 * @author 艾逗笔<765532665@qq.com>
	 */
	protected $_validate = array(
		array('name', 'require', '插件名称不能为空'),
		array('bzname', 'require', '插件标识名不能为空'),
        array('bzname','/^[a-zA-Z][a-zA-Z]{1,29}$/','插件标识名不合法',0,'regex'),// 必填
        array('bzname','isExist','相同名称的插件文件夹已存在',0,'callback',4), // 自定义函数验证密码格式
		array('bzname', '', '标识名相同的插件已安装', 0, 'unique', 1),
		array('version', 'require', '插件版本号不能为空'),
        array('version','/^[0-20]\.([0-9]\.){0,1}[0-9]$/','插件版本号格式不正确',0,'regex'),// 必填
		array('author', 'require', '作者姓名不能为空'),
		array('desc', 'require', '插件描述必须'),
		array('type', 'require', '请选择插件类型',1),
	);

	/**
	 * 自动完成
	 * @author 艾逗笔<765532665@qq.com>
	 */
	protected $_auto = array(
		array('status', 1, 3)
	);

    /**
     * 判断插件是否已经存在
     * @desc
     * @author 16
     * @date 2018/5/10
     */
	public function isExist($value){
	    return is_dir(ADDON_PATH."{$value}") ? false : true;
    }

	/**
	 * 根据插件标识名获取插件信息
	 * @author 艾逗笔<765532665@qq.com>
	 */
	public function get_addon_info_by_bzname($bzname) {
		if (!$bzname) {
			return false;
		}
		$map['bzname'] = $bzname;
		$addon_info = M('addons')->where($map)->find();
		if (!$addon_info) {
			return false;
		}
		return $addon_info;
	} 

	/**
	 * 获取已安装的插件
	 * @author 艾逗笔<765532665@qq.com>
	 */
	public function get_installed_addons() {
		$map['status'] = 1;
		$addons = M('addons')->where($map)->select();
		foreach ($addons as $k => &$v) {
			$addon_dir_info = $this->get_addon_dir_info($v['bzname']);
			$v['last_version'] = $addon_dir_info['version'];
			if (!$v['last_version']) {
				unset($addons[$k]);
			}
			if ($v['last_version'] > $v['version']) {
				$v['need_upgrade'] = 1;
			} else {
				$v['need_upgrade'] = 0;
			}
			if (!empty($v['type'])) {
				$typeArr = explode(',', $v['type']);
				$types = [];
				if (in_array(1, $typeArr)) {
					$types[] = '公众号';
				}
				if (in_array(2, $typeArr)) {
					$types[] = '小程序';
				}
				$v['type'] = implode(',', $types);
			} else {
				$v['type'] = '公众号';
			}
		}
		if (!$addons) {
			return false;
		}
		
		return $addons;
	}

	/**
	 * 获取公众号可以使用的插件
	 * @author 艾逗笔<765532665@qq.com>
	 */
	public function get_access_addons($mpid = '') {
		if (!$mpid) {
			$mpid = get_mpid();
		}
		$mp_info = D('Admin/Mp')->get_mp_info($mpid);
		if (!$mp_info) {
			return false;
		}
		$group_id_str = $mp_info['group_id'];
		if (!$group_id_str) {
			return false;
		}
		$group_id_arr = json_decode($group_id_str, true);
		$MpGroup = D('Admin/MpGroup');
		$addons_arr = array();
		foreach ($group_id_arr as $k => $v) {
			$group_info = $MpGroup->get_group_info($v);
			$addons = $group_info['addons'];
			$addons_arr = array_merge($addons_arr, json_decode($addons, true));
		}
		if (!$addons_arr) {
			return false;
		}
		foreach ($addons_arr as $k => $v) {
			$addon_info = $this->get_addon_info_by_bzname($v);
			$access_addons[] = $addon_info;
		}
		if (!$access_addons) {
			return false;
		}
		return $access_addons;
	}

	/**
	 * 卸载插件
	 * @author 艾逗笔<765532665@qq.com>
	 */
	public function uninstall_addon($bzname) {
		if (empty($bzname)) {
			return false;
		}
		$exists_addon_info = $this->get_addon_info_by_bzname($bzname);
		if (!$exists_addon_info || $exists_addon_info['status'] == 0) {
			return false;
		}
		$map['bzname'] = $bzname;
		M('addons')->where($map)->setField('status', 0);
		return true;
	}

	/**
	 * 获取插件文件夹信息
	 * @author 艾逗笔<765532665@qq.com>
	 */
	public function get_addon_dir_info($bzname) {
		global $_G;
		if (!$bzname) {
			return false;
		}
		$info_path = ADDON_PATH . $bzname . DIRECTORY_SEPARATOR . 'info.php';
		if (!is_file($info_path)) {
			return false;
		}
		$addon_info = include $info_path;
		if ($addon_info['logo']) {
			$addon_info['logo'] = $_G['site_url'] . 'Addons/' . $addon_info['bzname'] . '/' . $addon_info['logo'];
		} else {
			$addon_info['logo'] = __ROOT__ . '/Public/Admin/img/nopic.jpg';
		}
		
		if ($addon_info['bzname'] != $bzname) {
			return false;
		}
		if (!$addon_info['name'] || !$addon_info['version'] || !$addon_info['author']) {
			return false;
		}
		return $addon_info;
	}
} 

?>