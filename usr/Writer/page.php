<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="primary" class="col-md-9 content-area">
	<main id="main" role="main">
		<article class="post-content page type-page">
			<header class="entry-header">
				<span class="screen-reader-text"><?php $this->title() ?></span>
				<h1 class="entry-title"><?php $this->title() ?></h1>
			</header>
			
			<div class="entry-content">
				<?php $this->content(); ?>
			</div>
		</article>
	</main>
	
	<div>
		<?php $this->need('comments.php'); ?>
	</div>
</div>

<?php $this->need('sidebar.php'); ?>

<?php $this->need('footer.php'); ?>
