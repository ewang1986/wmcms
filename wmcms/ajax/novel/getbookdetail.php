<?php
/**
 *
 * 获取小程序首页内容
 *
 * TODO 请求地址 http://www.wm.com/wmcms/ajax/index.php?action=novel.getappmain&cid=1
 *
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31 0031
 * Time: 16:42
 */

//TODO 引入类
//require_once __DIR__.'/../../../module/novel/novel.common.php';
require_once __DIR__.'/../../../module/novel/novel.class.php';

// TODO 获取get/post参数
$novel_id = Request('id');
$istxt = Request('istxt' , 0);

//TODO 设置响应码 初始化响应数据
$code = 200;
$data = '';

//TODO new模型类 路径 /wmcms/models/*.*.model.php
$chapterMod = NewModel('novel.chapter');
$authorMod = NewModel('author.author');
$applyMod = NewModel('system.apply');

//TODO API的业务逻辑参考PC端
$where['novel_id'] = $novel_id;
$data = str::GetOne(novel::GetData( 'content' , $where));
$data['novel_name'] = str::DelHtml($data['novel_name']);


/*if( $cid > 0 )
{
    $code = 200;
    $data = $chapterMod->GetById( str::Int($cid) );
    if( !$data )
    {
        $code = 201;
    } else {
        $novelLang = GetModuleLang('novel');
        $data['chapter_type'] = $novelLang['novel']['par']['chapter_type_'.$data['chapter_ispay']];

        //如果作者存在，并且为自己就
        if( $data['chapter_status'] != 1 && $data['is_content'] == false)
        {
            $author = $authorMod->GetAuthor();
            if( $author )
            {
                $where['apply_module'] = 'author';
                $where['apply_type'] = array('or','novel_editchapter');
                $where['apply_cid'] = $cid;
                $applyData = $applyMod->GetOne($where);
                $applyData = unserialize($applyData['apply_option']);
                $data['content'] = $applyData['content'];
            }
        }
        if( $istxt == 1)
        {
            $data['content'] = str::ToTxt($data['content']);
        }
    }
    $info = $lang['system']['operate']['success'];
} else {
    $info = $lang['system']['par']['err'];
}*/

ReturnData($info , $ajax , $code , $data);

?>