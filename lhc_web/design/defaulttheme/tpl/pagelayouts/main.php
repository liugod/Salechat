<!DOCTYPE html>

<html <?php if (($detect = new Mobile_Detect()) && ($detect->isMobile() || $detect->isTablet())) : ?>data-mobile="true"<?php endif; ?> <?php if (!isset($Result['anonymous']) && (int)erLhcoreClassModelUserSetting::getSetting('dark_mode',0) == 1) : ?>dark="true" data-bs-theme="dark"<?php else : ?>bright="true" data-bs-theme="bright"<?php endif;?> lang="<?php echo erConfigClassLhConfig::getInstance()->getDirLanguage('content_language')?>" dir="<?php echo erConfigClassLhConfig::getInstance()->getDirLanguage('dir_language')?>" ng-app="lhcApp">
	<head>
		<?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_head.tpl.php'));?>
	</head>
<body 
    id="admin-body" 
    class="<?php if (!isset($Result['anonymous']) && (int)erLhcoreClassModelUserSetting::getSetting('dark_mode',0) == 1) : ?>dark<?php endif;?> font-outfit text-body-color bg-gray-light dark:bg-gray-darker <?php isset($Result['body_class']) ? print $Result['body_class'] : ''?>"
    x-data="{ sidebarToggle: false, darkMode: <?php echo (!isset($Result['anonymous']) && (int)erLhcoreClassModelUserSetting::getSetting('dark_mode',0) == 1) ? 'true' : 'false'; ?> }"
    x-init="darkMode && document.documentElement.classList.add('dark')"
    @keydown.escape="sidebarToggle = false">

<lhc-app></lhc-app>
<?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_top_content_multiinclude.tpl.php'));?>
<?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_head_multiinclude.tpl.php'));?>

<!-- TailAdmin Layout Wrapper -->
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/sidemenu.tpl.php'));?>

    <!-- Chat Sidebar (if needed) -->
    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/sidemenu_chats.tpl.php'));?>

    <!-- Content Area -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <!-- Header -->
        <?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu.tpl.php'));?>

        <!-- Main Content -->
        <main class="flex-1">
            <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/can_use_chat.tpl.php'));?>
            
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6" id="middle-column-page" ng-cloak ng-controller="LiveHelperChatCtrl as lhc">
                <?php if (isset($Result['path'])) : ?>
                    <div><div>
                    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/path.tpl.php'));?>
                <?php endif; ?>

                    <?php echo $Result['content']; ?>

                <?php if (isset($Result['path'])) : ?>
                    </div></div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>


<?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_footer.tpl.php'));?>

<?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_bottom_content_multiinclude.tpl.php'));?>

<?php if (erConfigClassLhConfig::getInstance()->getSetting( 'site', 'debug_output' ) == true) {
		$debug = ezcDebug::getInstance();
        echo "<div><pre class='bg-light text-dark m-2 p-2 border'>" . json_encode(erLhcoreClassUser::$permissionsChecks, JSON_PRETTY_PRINT) . "</pre></div>";
		echo $debug->generateOutput();
} ?>

</body>
</html>