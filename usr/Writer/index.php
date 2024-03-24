<?php
/**
 * Typecho 清爽简洁日记主题 Writer<br><span style="font-size:12px;"><font style="color:#fff;background:#db0000;">提示</font>：更多 Typecho 主题请到 <a href="https://www.typecho.wiki" target="_blank" title="TypechoWiki主题插件下载"><font style="color:#fff;background: #4CAF50;">Typecho.wiki</font></a> 下载</span>
 * 
 * @package Writer 
 * @author Roogle
 * @version 1.2
 * @link https://www.moidea.info
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div id="primary" class="col-md-12 content-area">
    <main id="main" class="site-main">
        <div class="article-grid-container"> 
		<?php while($this->next()): ?>
			<article class="post-content post-156 post type-post status-publish format-standard has-post-thumbnail hentry category-business category-entertainment category-fashion category-food category-movie category-tech category-travel tag-lifestyle tag-news">
				<div class="row post-feed-wrapper">
					<div class="col-md-12 post-thumbnail-wrap">
						<a href="<?php $this->permalink() ?>" rel="bookmark">
							<div class="post-thumbnail" style="background-image: url('<?php showThumbnail($this); ?>')"></div>
							<h5 class="entry-date"><time class="entry-date" datetime="<?php $this->date(); ?>"><?php $this->date(); ?></time></h5>
						</a>
					</div>
					<div class="col-md-12">
						<div class="blog-feed-contant">
							<header class="entry-header">
								<span class="screen-reader-text"><?php $this->title() ?></span>
								<h2 class="entry-title"> <a href="<?php $this->permalink() ?>" rel="bookmark"><?php $this->title() ?></a></h2>
							</header>
							<a href="<?php $this->permalink() ?>" class="no-decoration"><div class="entry-summary"><p><?php $this->excerpt(100, '...');//150就是摘要的字数 ?></p></div> </a>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
		<nav class="navigation posts-navigation">
			<h2 class="screen-reader-text">Posts navigation</h2>
			<div class="nav-links">
				<div class="row">
					<div class="col-md-6 next-post">
						<?php $this->pageLink('<i class="fa fa-long-arrow-left"></i> Newer Posts','prev'); ?>
					</div>
					<div class="col-md-6 prev-post">						
						<?php $this->pageLink('Older Posts <i class="fa fa-long-arrow-right"></i>','next'); ?>
					</div>
				</div>
			</div>
		</nav>

		

<?php $this->need('footer.php'); ?>
