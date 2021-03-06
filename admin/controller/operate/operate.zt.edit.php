<?php
/**
* 专题页面控制器文件
*
* @version        $Id: operate.zt.edit.php 2016年5月9日 21:55  weimeng
* @package        WMCMS
* @copyright      Copyright (c) 2015 WeiMengCMS, Inc.
* @link           http://www.weimengcms.com
*
*/
$tempSer = AdminNewClass('system.templates');
$ztSer = AdminNewClass('operate.zt');

//所有模块分类
$statusArr = $ztSer->GetStatus();


//接受数据
$id = Get('id');
if( $type == '' ){$type = 'add';}


//如果id大于0
if ( $type == 'edit')
{
	$where['table'] = '@zt_zt';
	$where['where']['zt_id'] = $id;

	$data = wmsql::GetOne($where);
	
	//查询使用的模版信息
	$temp['cname'] = $tempSer->GetTemp( $data['zt_ctempid'] , 'temp_name' );
}
//不存在就设置默认值
else
{
	$data['zt_status'] = '1';
	$data['zt_read'] = '0';
	$data['zt_title'] = '网页标题';
	$data['zt_key'] = '网页关键词';
	$data['zt_desc'] = '网页描述';
}
?>