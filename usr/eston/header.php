<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/eston-layout.min.css'); ?>">


    <?php $this->header('wlw=&xmlrpc=&rss2=&atom=&rss1=&template=&pingback=&generator'); ?>
</head>
<body>

<div class="wrapper">


  <header role="header" class="header" data-js="header">
  <div class="wrapper header-wrapper">
    <div class="nav header-item header-credit">
      Honour by Typecho
    </div>
    <h1 itemprop="name" class="header-item header-title">
    <a itemprop="url" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>"><?php $this->options->title() ?></a>
    </h1>
    <p itemprop="description" class="header-item header-about">
      <?php $this->options->description() ?>
    </p>
    <nav class="nav header-item header-nav" role="navigation">
    <span class="nav-item<?php if($this->is('index')): ?> nav-item-current<?php endif; ?>">
    <a href="<?php $this->options->siteUrl(); ?>" title="首页">
    <span itemprop="name">首页</span>
    </a>
    </span>

    <!--循环显示页面-->
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>

    <span class="nav-item<?php if($this->is('page', $pages->slug)): ?> nav-item-current<?php endif; ?>">
    <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
    <span><?php $pages->title(); ?></span>
    </a>
    </span>
    <?php endwhile; ?>
    <!--结束显示页面-->

    <!--循环所有分类-->
    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
    <?php while ($category->next()): ?>

    <span class="nav-item<?php if($this->is('category', $category->slug)): ?> nav-item-current<?php endif; ?>">
    <a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>">
    <span><?php $category->name(); ?></span>
    </a>
    </span>
    <?php endwhile; ?>
    <!--结束显示分类-->

    <!--循环显示标签 其中limit的5为显示数量-->
	<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 5))->to($tags); ?>   
	<?php while($tags->next()): ?> 

	<span class="nav-item<?php if($this->is('tag', $tags->slug)): ?> nav-item-current<?php endif; ?>">
    <a href="<?php $tags->permalink(); ?>" title="<?php $tags->name(); ?>">
    <span><?php $tags->name(); ?></span>
    </a>
    </span>
	<?php endwhile; ?>
    <!--结束显示标签-->


    </nav>
  </div>
  </header>



  <main role="main" class="main">


    
    
