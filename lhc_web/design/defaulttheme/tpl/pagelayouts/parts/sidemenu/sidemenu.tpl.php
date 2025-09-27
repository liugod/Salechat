<?php $currentUser = erLhcoreClassUser::instance(); ?>
<!-- Sidebar -->
<aside 
    :class="sidebarToggle ? 'translate-x-0 lg:w-20' : '-translate-x-full'"
    class="fixed left-0 top-0 z-50 flex h-screen w-72 flex-col overflow-y-hidden border-r border-stroke bg-white px-5 shadow-sidebar transition-all duration-300 ease-in-out lg:static lg:translate-x-0 dark:border-gray-800 dark:bg-gray-dark" 
    id="sidebar-wrapper" 
    translate="no">
    
    <!-- Sidebar Header -->
    <div 
        :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 pb-7 sidebar-header">
        
        <a href="<?php echo erLhcoreClassDesign::baseurl('/')?>">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <h2 class="text-xl font-bold text-title-color dark:text-white">Live Helper Chat</h2>
            </span>
            <div 
                class="logo-icon flex items-center justify-center w-10 h-10 bg-primary rounded-lg"
                :class="sidebarToggle ? 'lg:block' : 'hidden'">
                <span class="text-white font-bold text-lg">L</span>
            </div>
        </a>

        <!-- Hide/Show chats toolbar button -->
        <button 
            class="flex items-center justify-center w-8 h-8 rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800"
            :class="sidebarToggle ? 'lg:hidden' : ''"
            onclick="ee.emitEvent('svelteToggleList',['rmtoggle']);" 
            title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Hide/Show chats toolbar')?>">
            <i class="material-icons text-sm">menu</i>
        </button>
    </div>
    
    <!-- Sidebar Navigation -->
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <nav class="mt-5 py-4 space-y-1">
            <!-- Menu Group Header -->
            <div>
                <h3 class="mb-4 text-xs uppercase tracking-wider text-gray-500 font-medium" :class="sidebarToggle ? 'lg:hidden' : ''">
                    Menu
                </h3>
                
                <!-- Dashboard -->
                <a class="group relative flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-600 transition-all hover:bg-primary hover:bg-opacity-10 hover:text-primary dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white" 
                   href="<?php echo erLhcoreClassDesign::baseurl('/')?>" 
                   onclick="$('#tabs a[href=\'#dashboard\']').tab('show');return !($('#tabs a[href=\'#dashboard\']').length > 0);">
                    <i class="material-icons text-lg">home</i>
                    <span :class="sidebarToggle ? 'lg:hidden' : ''"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Dashboard')?></span>
                </a>

                <!-- Include other menu items -->
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/chat/chat.tpl.php'));?>
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/settings/settings.tpl.php'));?>
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu_modules_container.tpl.php.tpl.php'));?>  
                <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/menu_item_multiinclude.tpl.php'));?>  
            </div>
        </nav>
    </div>
    
    <?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/sidemenu/after_sidemnu_multiinclude.tpl.php'));?>
    <lhc-connection-status></lhc-connection-status>
</aside>

