<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/


// 分类文章数量控制 
function themeInit($archive) { 
    if ($archive->is('index')) { 
        $archive->parameter->pageSize = 12; // 自定义条数 
    } else {
		$archive->parameter->pageSize = 12; // 自定义条数
	}
}

/** 输出文章缩略图 */ 
function showThumbnail($widget){ 
    // 当文章无图片时的默认缩略图
    //$rand = rand(1,5); // 随机 1-5 张缩略图
    //$random = $widget->widget('Widget_Options')->themeUrl . '/img/sj/' . $rand . '.jpg'; // 随机缩略图路径
    $random = $widget->widget('Widget_Options')->themeUrl . '/img/nopic.gif'; // 若只想要一张默认缩略图请删除本行开头的"//"
	
	$content = $widget->text;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 

	if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][0];
    } else {
		echo $random;
    }
}

/** 
 * 显示下一个内容的标题链接 
 * 
 * @access public 
 * @param string $default 如果没有下一篇,显示的默认文字 
 * @return void 
 */ 
function theNext($widget, $default = "已经是最后一篇了") { 
    $db = Typecho_Db::get(); 
    $sql = $db->select()->from('table.contents') 
                    ->where('table.contents.created > ?', $widget->created) 
                    ->where('table.contents.status = ?', 'publish') 
                    ->where('table.contents.type = ?', $widget->type) 
                    ->where('table.contents.password IS NULL') 
                    ->order('table.contents.created', Typecho_Db::SORT_ASC) 
                    ->limit(1); 
    $content = $db->fetchRow($sql); 
                 
    if ($content) { 
        $content = $widget->filter($content); 
        $link = '<div class="col-md-6 next-article"><a class="" href="' . $content['permalink'] . '"><span class="next-prev-text"> 下一篇</span><p>' . $content['title'] . '</p></a></div>'; 
        echo $link; 
    } else {
        //$link = $default; 
        echo ''; 
    } 
} 

/** 
 * 显示上一个内容的标题链接 
 *  
 * @access public 
 * @param string $default 如果没有下一篇,显示的默认文字 
 * @return void 
 */ 
function thePrev($widget, $default = "前面已经没有了") { 
    $db = Typecho_Db::get(); 
    $sql = $db->select()->from('table.contents') 
                          ->where('table.contents.created < ?', $widget->created) 
                          ->where('table.contents.status = ?', 'publish') 
                          ->where('table.contents.type = ?', $widget->type) 
                          ->where('table.contents.password IS NULL') 
                          ->order('table.contents.created', Typecho_Db::SORT_DESC) 
                          ->limit(1); 
    $content = $db->fetchRow($sql); 
                 
    if ($content) { 
        $content = $widget->filter($content); 
        $link = '<div class="col-md-6 prev-article"><a class="" href="' . $content['permalink'] . '"><span class="next-prev-text">上一篇 </span><p>'. $content['title'] .'</p></a></div>'; 
		echo $link; 
    } else {  
		//$link = $default;
        echo ''; 
    } 
} 


