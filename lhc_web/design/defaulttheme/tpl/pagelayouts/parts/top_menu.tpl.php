<?php $currentUser = erLhcoreClassUser::instance(); ?>
<!-- Header -->
<header 
    x-data="{menuToggle: false}"
    class="sticky top-0 z-30 flex w-full bg-white border-b border-stroke shadow-sm lg:border-b dark:border-gray-800 dark:bg-gray-dark"
    translate="no">
    
    <div class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6">
        <div class="flex w-full items-center justify-between gap-2 px-4 py-4 sm:gap-4 lg:justify-normal lg:px-0">
            
            <!-- Hamburger Toggle BTN -->
            <button 
                :class="sidebarToggle ? 'lg:bg-gray-100 dark:lg:bg-gray-800 bg-gray-100 dark:bg-gray-800' : ''"
                class="z-50 flex h-11 w-11 items-center justify-center rounded-lg border border-stroke text-gray-500 hover:bg-gray-100 dark:border-gray-800 dark:text-gray-400 dark:hover:bg-gray-800"
                @click.stop="sidebarToggle = !sidebarToggle">
                <svg class="hidden fill-current lg:block" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z" fill=""/>
                </svg>
                <span class="material-icons lg:hidden">menu</span>
            </button>

            <!-- Logo and Brand (Mobile Only) -->
            <?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_head_logo_back_office.tpl.php'));?>

            <!-- Status and Notifications -->
            <lhc-status hide_quick_notifications="<?php echo (int)erLhcoreClassModelUserSetting::getSetting('hide_quick_notifications',0) == 1 ? 1 : 0?>"></lhc-status>

            <!-- Header Menu -->
            <div class="flex items-center gap-3 2xsm:gap-4 lg:w-full lg:justify-end">
                <ul class="flex items-center gap-2 2xsm:gap-4">
                    
                    <?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu_multiinclude.tpl.php'));?>
                    
                    <browser-notification></browser-notification>
                    <audio-checker></audio-checker>

                    <?php if ($currentUser->hasAccessTo('lhchat','use') && $currentUser->hasAccessTo('lhuser','changeonlinestatus'))  : ?>
                    <!-- Online Status Toggle -->
                    <li class="relative">
                        <change-online-status enable_shortcut="true"></change-online-status>
                    </li>
                    <?php endif; ?>

                    <!-- Dark Mode Toggle -->
                    <li class="relative">
                        <button 
                            @click="darkMode = !darkMode; darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')"
                            class="relative flex h-9 w-9 items-center justify-center rounded-full border border-stroke bg-gray-100 text-gray-600 hover:text-primary dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300">
                            <svg x-show="!darkMode" class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 0H9V2H7V0Z" fill=""/>
                                <path d="M2.34314 1.22876L0.928932 2.64297L2.34314 4.05718L3.75736 2.64297L2.34314 1.22876Z" fill=""/>
                                <path d="M16 7V9H14V7H16Z" fill=""/>
                                <path d="M13.6568 1.22876L12.2426 2.64297L13.6568 4.05718L15.0711 2.64297L13.6568 1.22876Z" fill=""/>
                                <path d="M5.5 8C5.5 6.61929 6.61929 5.5 8 5.5C9.38071 5.5 10.5 6.61929 10.5 8C10.5 9.38071 9.38071 10.5 8 10.5C6.61929 10.5 5.5 9.38071 5.5 8Z" fill=""/>
                                <path d="M2.34314 12.2426L3.75736 10.8284L2.34314 9.41419L0.928932 10.8284L2.34314 12.2426Z" fill=""/>
                                <path d="M0 7H2V9H0V7Z" fill=""/>
                                <path d="M7 14H9V16H7V14Z" fill=""/>
                                <path d="M15.0711 12.2426L13.6568 10.8284L12.2426 12.2426L13.6568 13.6568L15.0711 12.2426Z" fill=""/>
                            </svg>
                            <svg x-show="darkMode" class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.99993 11.9999C4.23858 11.9999 2.00024 9.76158 2.00024 6.99993C2.00024 4.23828 4.23858 1.99994 6.99993 1.99994C7.52552 1.99994 8.00024 1.52522 8.00024 0.999939C8.00024 0.474654 7.52552 -7.62939e-06 6.99993 -7.62939e-06C3.13393 -7.62939e-06 0.00024414 3.13369 0.00024414 6.99993C0.00024414 10.8662 3.13393 13.9999 6.99993 13.9999C7.52552 13.9999 8.00024 13.5252 8.00024 12.9999C8.00024 12.4746 7.52552 11.9999 6.99993 11.9999Z" fill=""/>
                                <path d="M11.0001 6.99994C11.0001 7.52553 11.4748 7.99994 12.0001 7.99994C12.5254 7.99994 13.0001 7.52553 13.0001 6.99994C13.0001 6.47436 12.5254 5.99994 12.0001 5.99994C11.4748 5.99994 11.0001 6.47436 11.0001 6.99994Z" fill=""/>
                                <path d="M13.6569 2.34315C14.0474 1.95262 14.6806 1.95262 15.0711 2.34315C15.4616 2.73367 15.4616 3.36684 15.0711 3.75736L14.364 4.46447C13.9735 4.85499 13.3403 4.85499 12.9498 4.46447C12.5593 4.07394 12.5593 3.44078 12.9498 3.05025L13.6569 2.34315Z" fill=""/>
                            </svg>
                        </button>
                    </li>
                    
                    <!-- User Profile -->
                    <?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/user_box.tpl.php'));?>

                </ul>
            </div>
        </div>
    </div>
</header>