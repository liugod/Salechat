<!DOCTYPE html>

<html <?php if (($detect = new Mobile_Detect()) && ($detect->isMobile() || $detect->isTablet())) : ?>data-mobile="true"<?php endif; ?> <?php if (!isset($Result['anonymous']) && (int)erLhcoreClassModelUserSetting::getSetting('dark_mode',0) == 1) : ?>dark="true" data-bs-theme="dark"<?php else : ?>bright="true" data-bs-theme="bright"<?php endif;?> lang="<?php echo erConfigClassLhConfig::getInstance()->getDirLanguage('content_language')?>" dir="<?php echo erConfigClassLhConfig::getInstance()->getDirLanguage('dir_language')?>" ng-app="lhcApp">
<head>
    <?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_head.tpl.php'));?>
</head>
<body id="admin-body" class="bg-gray-50 font-sans antialiased">
    <lhc-app></lhc-app>
    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_top_content_multiinclude.tpl.php'));?>
    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_head_multiinclude.tpl.php'));?>

    <!-- TailAdmin-style layout -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="flex flex-col w-64 bg-sidebar-900 border-r border-sidebar-800 transition-transform duration-300 ease-in-out">
            <!-- Sidebar header -->
            <div class="flex items-center justify-between h-16 px-6 bg-sidebar-900 border-b border-sidebar-800">
                <div class="flex items-center">
                    <h2 class="text-white font-semibold text-lg">LiveHelper Chat</h2>
                </div>
                <button id="sidebar-toggle" class="lg:hidden text-gray-300 hover:text-white">
                    <i class="material-icons">menu</i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                <?php $currentUser = erLhcoreClassUser::instance(); ?>
                
                <!-- Dashboard -->
                <a href="<?php echo erLhcoreClassDesign::baseurl('/')?>" 
                   onclick="$('#tabs a[href=\'#dashboard\']').tab('show');return !($('#tabs a[href=\'#dashboard\']').length > 0);" 
                   class="sidebar-nav-item active">
                    <i class="material-icons mr-3 text-lg">home</i>
                    <span><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Dashboard')?></span>
                </a>

                <?php if ($currentUser->hasAccessTo('lhchat','use')) : ?>
                <!-- Chats Section -->
                <div class="py-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 px-3">
                        <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Chat Management')?>
                    </p>
                    
                    <?php $menuItems = array(); ?>
                    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu_chat_actions.tpl.php'));?>
                    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu_online_users.tpl.php'));?>
                    
                    <?php if (!empty($menuItems)) : ?>
                        <?php foreach ($menuItems as $menuItem) : ?>
                            <a href="<?php echo $menuItem['href']?>" 
                               <?php if (isset($menuItem['onclick'])) : ?>onclick="<?php echo $menuItem['onclick']?>"<?php endif;?>
                               class="sidebar-nav-item">
                                <?php if (isset($menuItem['iclass'])) : ?>
                                    <i class="material-icons mr-3 text-lg"><?php echo $menuItem['iclass']?></i>
                                <?php endif;?>
                                <span><?php echo $menuItem['text']?></span>
                            </a>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if ($currentUser->hasAccessTo('lhsystem','use')) : ?>
                <!-- Settings -->
                <a href="<?php echo erLhcoreClassDesign::baseurl('system/configuration')?>" class="sidebar-nav-item">
                    <i class="material-icons mr-3 text-lg">settings_applications</i>
                    <span><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Settings')?></span>
                </a>
                <?php endif; ?>

                <!-- Additional menu items -->
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu_modules_container.tpl.php.tpl.php'));?>
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/menu_item_multiinclude.tpl.php'));?>
            </nav>

            <!-- Sidebar footer -->
            <div class="p-4 border-t border-sidebar-800">
                <lhc-connection-status></lhc-connection-status>
            </div>
        </div>

        <!-- Main content area -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation bar -->
            <header class="top-nav-modern">
                <div class="flex items-center">
                    <button id="mobile-menu-button" class="lg:hidden mr-4 text-gray-500 hover:text-gray-700">
                        <i class="material-icons">menu</i>
                    </button>
                    
                    <?php if (isset($Result['path'])) : ?>
                        <nav class="flex" aria-label="Breadcrumb">
                            <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/path.tpl.php'));?>
                        </nav>
                    <?php endif; ?>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- User menu and notifications would go here -->
                    <div class="relative">
                        <button class="btn-secondary-modern">
                            <i class="material-icons text-lg">account_circle</i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-y-auto bg-gray-50" ng-cloak ng-controller="LiveHelperChatCtrl as lhc">
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/can_use_chat.tpl.php'));?>
                
                <div class="p-6">
                    <?php echo $Result['content']; ?>
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

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            
            if (mobileMenuButton && sidebar) {
                mobileMenuButton.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        });
    </script>
</body>
</html>