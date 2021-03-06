<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?php echo Yii::app()->language; ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>">
            <meta name="google-site-verification" content="hg9AUxRqyk32CF675HLq6Wo0Mmb0rHOGCNSvXNUV6G4" />
            <title><?php echo ( count($this->pageTitle) ) ? implode(' - ', array_reverse($this->pageTitle)) : $this->pageTitle; ?></title>

            <?php Yii::app()->clientScript->registerCssFile(Yii::app()->themeManager->baseUrl . '/style/style.css', 'screen'); ?>

            <?php
            if (Yii::app()->locale->getOrientation() == 'rtl') {
                Yii::app()->clientScript->registerCssFile(Yii::app()->themeManager->baseUrl . '/style/rtl.css', 'screen');
            }
            ?>

            <!--[if lt IE 7]>
            <style type="text/css">@import "<?php echo Yii::app()->themeManager->baseUrl; ?>/style/ie.css";</style>
            <script src="<?php echo Yii::app()->themeManager->baseUrl; ?>/script/DD_belatedPNG.js" type="text/javascript"></script>
            <script type="text/javascript">
                DD_belatedPNG.fix('#logo span, #intro, #menuslide li, #texttestimonial, .icon1, .icon2, .icon3, .icon4, .icon5, .icon6, .icon7, .icon8, .icon9, .icon10, .icon11, .icon12, .icon13, .icon14, .icon15, .icon16, .icon17, .icon18, .icon19, #placepriceslide li, .ribbon1, .ribbon2, .ribbon3, #placemainmenu, .iconmini1, .iconmini2, #menupopup li div, #placemainmenu ul li ul li, #menupopup li div a.linkpopupdownload, #menupopup li div a.linkpopuprelease, #contentbottom, #placetwitter, img');
            </script>
            <![endif]-->
            <!--[if IE 7]><style type="text/css">@import "<?php echo Yii::app()->themeManager->baseUrl; ?>/style/ie7.css";</style>
            <script src="<?php echo Yii::app()->themeManager->baseUrl; ?>/script/DD_belatedPNG.js" type="text/javascript"></script>
            <script type="text/javascript">
                DD_belatedPNG.fix('#menupopup li div');
            </script>
            <![endif]-->

            <?php
            Yii::app()->clientScript->registerCoreScript('jquery');

//Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/ui_core.js' , CClientScript::POS_END );
//Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/ui_tabs.js' , CClientScript::POS_END );
//Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/lightbox.js' , CClientScript::POS_END );
//Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/bubblepopup.js' , CClientScript::POS_END );

            Yii::app()->clientScript->registerScriptFile(Yii::app()->themeManager->baseUrl . '/script/tiptip/jquery.tipTip.minified.js', CClientScript::POS_END);
            Yii::app()->clientScript->registerCssFile(Yii::app()->themeManager->baseUrl . '/script/tiptip/tipTip.css', 'screen');

            Yii::app()->clientScript->registerScriptFile(Yii::app()->themeManager->baseUrl . '/script/global.js', CClientScript::POS_END);
            ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <a href="<?php echo $this->createUrl('index/index'); ?>" class="replace" id="logo"><span></span>logo</a>
                <ul id="menutop">
                    <li><a href="<?php echo $this->createUrl('index/index', array('lang' => 'vi')); ?>"><?php echo Yii::t('global', 'Vietnamese'); ?></a></li>
                    <li class="last"><a href="<?php echo $this->createUrl('index/index', array('lang' => 'en')); ?>"><?php echo Yii::t('global', 'English'); ?></a></li>
                </ul>
            </div>
            <div id="placemainmenu">
                <ul id="mainmenu">

                    <?php
                    $headerMenu = array(
                        //'index/index' => Yii::t('global', 'Home'),
                        'documentation/index' => Yii::t('global', 'Documentation'),
                        'tutorials/index' => Yii::t('global', 'Tutorials'),
                        'extensions/index' => Yii::t('global', 'Extensions'),
                        'blog/index' => Yii::t('global', 'Blog'),
                        'forum/index' => Yii::t('global', 'Forum'),
                        'search/index' => Yii::t('global', 'Search'),
                        'contactus/index' => Yii::t('global', 'Contact Us'),
                    );

                    // Show the register or login button					
                    if (Yii::app()->user->isGuest) {
                        $headerMenu = array_merge($headerMenu, array(
                            'register/index' => Yii::t('global', 'Register'),
                            'login/index' => Yii::t('global', 'Login'),
                                ));
                    }
                    ?>

                    <?php foreach ($headerMenu as $key => $value): ?>
                        <li><a href='<?php echo $this->createUrl($key); ?>'><?php echo $value; ?></a></li>
                    <?php endforeach; ?>	

                </ul>
            </div>
            <div id="contenttop"></div>            
            <div id="content">
                <?php if (count($this->breadcrumbs)): ?>
                    <div id="newsinfo">
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'homeLink' => CHtml::link(Yii::t('global', 'Home'), array('index/index')),
                            'links' => $this->breadcrumbs
                        ));
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Start Notifications -->
                <?php if (Yii::app()->user->hasFlash('error')): ?>
                    <div class="notification errorshow png_bg">
                        <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                        <div><?php echo Yii::app()->user->getFlash('error'); ?></div>
                    </div>
                <?php endif; ?>

                <?php if (Yii::app()->user->hasFlash('attention')): ?>
                    <div class="notification attention png_bg">
                        <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                        <div><?php echo Yii::app()->user->getFlash('attention'); ?></div>
                    </div>
                <?php endif; ?>

                <?php if (Yii::app()->user->hasFlash('information')): ?>
                    <div class="notification information png_bg">
                        <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                        <div><?php echo Yii::app()->user->getFlash('information'); ?></div>
                    </div>
                <?php endif; ?>

                <?php if (Yii::app()->user->hasFlash('success')): ?>
                    <div class="notification success png_bg">
                        <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                        <div><?php echo Yii::app()->user->getFlash('success'); ?></div>
                    </div>
                <?php endif; ?>			
                <!-- End Notifications -->

                <?php echo $content; ?>

            </div>

            <div id='bottomnew'>&nbsp;</div>

            <div>
                <ul id="menufooter">
                    <li><strong><?php echo Yii::t('global', 'Copyright {name} {year} &copy All Rights Reserved', array('{name}' => Yii::app()->name, '{year}' => date('Y'))); ?></strong></li>
                    <li><?php echo CHtml::link(Yii::t('global', 'About Us'), array('/about-us', 'lang' => false)); ?></a></li>
                    <li><?php echo CHtml::link(Yii::t('global', 'F.A.Q'), array('/faq', 'lang' => false)); ?></a></li>
                    <li><?php echo CHtml::link(Yii::t('global', 'Terms Of Service'), array('/terms-of-service', 'lang' => false)); ?></li>
                    <?php if (Yii::app()->user->id): ?>
                        <li><?php echo CHtml::link(Yii::t('global', 'Profile'), array('/user/' . Yii::app()->user->id . '-' . Yii::app()->user->seoname, 'lang' => false)); ?></li>
                        <li><?php echo CHtml::link(Yii::t('global', 'Logout'), array('logout/index')); ?></a></li>
                    <?php endif; ?>
                    <?php if (( Yii::app()->user->role == 'admin' || Yii::app()->user->checkAccess('op_acp_access'))): ?>
                        <li><?php echo CHtml::link(Yii::t('global', 'Admin'), array('admin/index'), array('target' => '_blank')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>        
        
        <!-- Feedback button -->
        <div class='feedbackbutton'>
            <a href='<?php echo $this->createUrl('contactus/index'); ?>'>
                <img src='<?php echo Yii::app()->themeManager->baseUrl; ?>/images/feedbackbutton<?php echo Yii::app()->language; ?>.png' alt='' />
            </a>
        </div>
        <!-- End Feedback button -->
        
        <!-- Google Analytics -->
        <script type="text/javascript">
            /*var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
            try {
                var pageTracker = _gat._getTracker("UA-15161565-1");
                pageTracker._trackPageview();
            } catch(err) {}*/
        </script>
        <!-- End Google Analytics -->
        
    </body>
</html>