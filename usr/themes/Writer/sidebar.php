<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary" class="col-md-3 sidebar widget-area" role="complementary">
	<div class="secondary-inner">
		<aside id="text-5" class="widget widget_text">
			<div class="textwidget">
				<img src="<?php $this->options->themeUrl(); ?>img/touxiang.png" alt="Jane Doe">
				<p style="text-align:center;">多思多金一个中英文国外网赚思路记录博客</p>
				<hr>
			</div>
		</aside>
		
		<aside id="archives-2" class="widget widget_archive">
			<div class="sidebar-headline-wrapper">
				<div class="widget-title-lines"></div>
				<h4 class="widget-title">文章归档</h4>
			</div>
			<ul>
				 <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
			</ul>
		</aside>
		
		<aside id="categories-2" class="widget widget_categories">
			<div class="sidebar-headline-wrapper">
				<div class="widget-title-lines"></div>
				<h4 class="widget-title">分类导航</h4>
			</div>
			<ul>
				<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
			</ul>
		</aside>
		
		<aside id="text-6" class="widget widget_text">
			<div class="sidebar-headline-wrapper">
				<div class="widget-title-lines"></div>
				<h4 class="widget-title">广告赞助</h4>
			</div>
			<div class="textwidget">
				<a href="https://www.nihaowua.com/home.html" target="_blank"><img src="<?php $this->options->themeUrl(); ?>img/92.jpg" alt="book" style="margin:0;"></a>
			</div>
		</aside>
	</div>
</div>
<!-- end #sidebar -->
