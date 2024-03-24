<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
	<meta charset="<?php $this->options->charset(); ?>">
	<meta name="viewport" content="width=device-width">
	
	<meta http-equiv="content-language" content="zh-CN">
	<meta name="language" content="zh-CN">
	
	<link type="text/css" media="all" href="<?php $this->options->themeUrl(); ?>style.css?ver20180620" rel="stylesheet">
	
	<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
	
	<meta name="description" content="<?php if($this->is('index')){$this->options->description();}elseif($this->is('post')||$this->is('page')){$this->excerpt(100, '...');}else{$this->options->description();} ?>">
	
	<link rel="canonical" href="<?php $this->permalink(); ?>">
	
	<meta property="og:locale" content="zh-CN">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php if($this->is('index')){$this->options->title();}elseif($this->is('post')||$this->is('page')){$this->title();} ?>">
	<meta property="og:description" content="<?php if($this->is('index')){$this->options->description();}elseif($this->is('post')||$this->is('page')){$this->excerpt(100, '...');} ?>">
	<meta property="og:url" content="<?php $this->permalink(); ?>">
	<meta property="og:site_name" content="<?php $this->options->title(); ?>">
	
	<meta name="twitter:card" content="summary">
	<meta name="twitter:description" content="<?php if($this->is('index')){$this->options->description();}elseif($this->is('post')||$this->is('page')){$this->excerpt(100, '...');}else{$this->options->description();} ?>">
	<meta name="twitter:title" content="<?php if($this->is('index')){$this->options->title();}elseif($this->is('post')||$this->is('page')){$this->title();} ?>">
	
	<?php $this->header('keywords=&description=&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
</head>
<body class="<?php if($this->is('index')){ echo 'home blog'; }?><?php if($this->is('archive')){echo 'archive category';}?><?php if($this->is('page')){echo 'page-template-default page';}?><?php if($this->is('post')){echo 'post-template-default single single-post';}?>">
	<div id="page" class="hfeed site">
		<header id="masthead">
			<nav class="navbar lh-nav-bg-transform navbar-default navbar-fixed-top navbar-left">
				<div class="container" id="navigation_menu">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?php $this->options->siteUrl(); ?>"><div class="navbar-brand"><?php $this->options->title(); ?></div> </a>
					</div>
					
					<div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 0px;">
						<ul id="menu-menu-1" class="nav navbar-nav">
							<li class="menu-item"><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
							<?php $this->widget('Widget_Metas_Category_List')->parse('<li class="menu-item"><a href="{permalink}">{name}</a></li>'); ?>
							<li class="menu-item dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">独立页面<span class="caret"></span></a>
							<ul role="menu" class=" dropdown-menu">
								<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
								<?php while($pages->next()): ?>
									<li class="menu-item"><a href="<?php $pages->permalink(); ?>"title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
								<?php endwhile; ?>
							</ul>
							</li>
						</ul>
					</div>
				</div>				
			</nav>
			
			<?php if($this->is('index')){?>
			<div class="site-header">
				<div class="site-branding">
					<span class="home-link">
						<span class="frontpage-site-title"><?php $this->options->title(); ?></span>
						<span class="frontpage-site-description">WRITERS</span>
					</span>
				</div>
			</div>
			<?php } ?>
		</header>
		
		<div id="content" class="site-content">
			<div class="container">
				<div class="row">