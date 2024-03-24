<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->comments()->to($comments); ?>

<div class="post-comments">
	<div id="comments" class="comments-area">
	<?php if ($comments->have()): ?>

		<h2 class="comments-title"> <?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?> 条回复关于<?php $this->title() ?></h2>
    
    	<?php $comments->listComments(); ?>

    	<div class="pagenav"><?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
    
	<?php endif; ?>

	<?php if($this->allow('comment')): ?>

		<div id="respond" class="comment-respond">
		
			<h3 id="reply-title" class="comment-reply-title">添加新评论<small><?php $comments->cancelReply(); ?></small></h3>
			
			<form  method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="comment-form">
				<p class="comment-notes"><span id="email-notes">我们会加密处理您的邮箱保证您的隐私.</span> 标有星号的为必填信息 <span class="required">*</span></p>
				
				<p class="comment-form-comment"><textarea name="text" id="comment" cols="45" rows="8" maxlength="65525" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};" placeholder="<?php _e('在这里输入你的评论(Ctrl/Cmd+Enter也可以提交)...'); ?>" required aria-required="true"><?php $this->remember('text',false); ?></textarea>
				</p>
				
				<?php if($this->user->hasLogin()): ?>
				<p><?php _e('当前登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
				<?php else: ?>
				<p class="comment-form-author"><label for="author">昵称 <span class="required">*</span></label> <input id="author" name="author" type="text" value="<?php $this->remember('author'); ?>" size="30" maxlength="245" required="required"></p>
				
				<p class="comment-form-email"><label for="email">邮箱 <?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></label>
				<input type="email" name="mail" id="mail" value="<?php $this->remember('mail'); ?>" size="30" maxlength="100" <?php if ($this->options->commentsRequireMail): ?>required="required"<?php endif; ?>>
				</p>
				
				<p class="comment-form-url"><label for="url">网站 <?php if ($this->options->commentsRequireURL): ?> <span class="required">*</span><?php endif; ?></label> <input id="url" name="url" type="url" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" size="30" maxlength="200" <?php if ($this->options->commentsRequireURL): ?>required="required"<?php endif; ?>></p>
				<?php endif; ?>
				
				<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="提交评论"> <input type="hidden" name="comment_post_ID" value="138" id="comment_post_ID"> <input type="hidden" name="comment_parent" id="comment_parent" value="0"></p>
			</form>
		</div>
	<?php else: ?>
    	<h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>	
	</div>
</div>
