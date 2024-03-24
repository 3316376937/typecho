<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="primary" class="col-md-9 content-area">
	<main id="main" role="main">
		<article class="post-content post type-post">
			<header class="entry-header">
				<span class="screen-reader-text"><?php $this->title() ?></span>
				<h1 class="entry-title"><?php $this->title() ?></h1>
				<div class="entry-meta">
					<h5 class="entry-date"><time class="entry-date" datetime="<?php $this->date(); ?>" pubdate=""><?php $this->date(); ?></time></h5>
				</div>
			</header>
			
			<div class="entry-content">
				<?php $this->content(); ?>
			</div>
		</article>
	</main>
	
	<div>
		<?php $this->need('comments.php'); ?>
	</div>
	
	<div class="post-navigation">
		<nav class="navigation">
			<h2 class="screen-reader-text">Post navigation</h2>
			<div class="nav-links">
				<div class="row">
					<?php thePrev($this); ?>
					<?php theNext($this); ?>
				</div>
			</div>
		</nav>
	</div>
</div>

<?php $this->need('sidebar.php'); ?>

<?php $this->need('footer.php'); ?>
