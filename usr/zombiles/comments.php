<div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
			<h4><?php $this->commentsNum(_t('当前暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?> &raquo;</h4>
            
            <?php $comments->pageNav(); ?>
            
            <?php $comments->listComments(); ?>
            
            <?php endif; ?>
            <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
            
            <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
            </div>
            
			<h4 id="response"><?php _e('添加新评论'); ?> &raquo;</h4>
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
                <?php if($this->user->hasLogin()): ?>
				<div>以<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>身份登录. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></div>
                <?php else: ?>
				<div>
                    <label for="author"><?php _e('昵称:'); ?></label>
					<input type="text" name="author" id="author" class="text" size="15" value="<?php $this->remember('author'); ?>" />
				</div>
				<div>
                    <label for="mail"><?php _e('电邮:'); ?><?php if ($this->options->commentsRequireMail): ?><?php endif; ?></label>
					<input type="text" name="mail" id="mail" class="text" size="15" value="<?php $this->remember('mail'); ?>" />
				</div>
				<div>
                    <label for="url"><?php _e('网站:'); ?><?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
					<input type="text" name="url" id="url" class="text" size="15" value="<?php $this->remember('url'); ?>" />
				</div>
                <?php endif; ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/quicktag.js'); ?>"></script>
<script type="text/javascript">edToolbar('comment');</script>
				<div><textarea rows="5" cols="50" name="text" class="textarea" id="comment"><?php $this->remember('text'); ?></textarea></div>
				<div><input type="submit" value="<?php _e('提交评论'); ?>" class="submit" /></div>
			</form>
            </div>
            <?php else: ?>
            <h4><?php _e('评论已关闭'); ?></h4>
            <?php endif; ?>
		</div>
