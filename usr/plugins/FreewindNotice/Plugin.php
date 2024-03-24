<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * Freewind主题专属站点公告插件
 *
 * @package Freewind Notice
 * @author Mr丶冷文
 * @version 1.0.0
 * @link https://kevinlu98.cn/
 */
class FreewindNotice_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('freewind')->rightToolBar = array('FreewindNotice_Plugin', 'render');
        Typecho_Plugin::factory('freewind')->contentTop = array('FreewindNotice_Plugin', 'contentTop');
        Typecho_Plugin::factory('Widget_Archive')->header = array('FreewindNotice_Plugin', 'header');
        Typecho_Plugin::factory('freewind')->pjaxload = array('FreewindNotice_Plugin', 'pjaxload');
    }

    public static function header()
    {
        echo '<link rel="stylesheet" href="' . Helper::options()->siteUrl . __TYPECHO_PLUGIN_DIR__ . '/FreewindNotice/css/style.css">';
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $notice = new Typecho_Widget_Helper_Form_Element_Textarea(
            'notice',
            NULL,
            '站点公告',
            _t('站点公告'),
            "点击右侧栏的小铃铛显示公告信息，且在首页及文章详情页也会显示，首页及文章详情页的公告信息在用户点击关闭后1小时内不在显示");
        $form->addInput($notice);
        $type = new Typecho_Widget_Helper_Form_Element_Radio(
            'type',
            [
                'fw-notice-alert-normal' => '提示通知',
                'fw-notice-alert-success' => '成功通知',
                'fw-notice-alert-warning' => '警告通知',
                'fw-notice-alert-danger' => '危险通知',
            ],
            'fw-notice-alert-normal',
            _t('展示类型'));
        $form->addInput($type);
        $updated = new Typecho_Widget_Helper_Form_Element_Hidden('updated', null, time());
        $form->addInput($updated);
        ?>
        <script>
            window.onload = function () {
                let form = document.getElementsByTagName("form")[0]
                let update = document.querySelector("input[name=updated]")
                console.log(update);
                form.onsubmit = function () {
                    update.value = new Date().valueOf() / 1000
                }
            }
        </script>
        <?php
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 插件实现方法
     *
     * @access public
     * @return void
     */
    public static function render()
    {
        ?>
        <div id="right-advise" class="right-tool-item" style="width: 300px;">
            <a class="right-btn" data-target="right-advise" href="javascript:void(0)">
                <i style="font-size: 20px" class="iconfont icon-remind-fill"></i></a>
            <div class="right-title">站点公告</div>
            <div class="right-content" style="border-radius: 0 0 10px 10px">
                <?php echo Typecho_Widget::widget('Widget_Options')->plugin('FreewindNotice')->notice ?>
                <div class="right-tips">点击小铃铛关闭</div>
            </div>
        </div>
        <?php
    }


    public static function contentTop()
    {
        ?>
        <!--        --><?php //if (!Freewind_Cookie::get(__CACHE_ADVISE__)):
        ?>
        <div class="fw-notice-alert opacity-item pos-rlt <?php echo Typecho_Widget::widget('Widget_Options')->plugin('FreewindNotice')->type ?>">
            <?php echo Typecho_Widget::widget('Widget_Options')->plugin('FreewindNotice')->notice ?>
            <p class="time-notice">
                发布于<?php echo date('Y-m-d', Typecho_Widget::widget('Widget_Options')->plugin('FreewindNotice')->updated) ?></p>
            <i class="fa fa-close pos-abs" id="close-notice"></i>
        </div>
        <!--    --><?php //endif;
        ?>
        <?php
    }

    public static function pjaxload()
    {
        ?>
            $("#close-notice").on('click', function () {
                $(".fw-notice-alert").fadeOut()
                $.get('<?php Helper::options()->siteUrl(); ?>/close/notice')
            })
        <?php
    }
}
