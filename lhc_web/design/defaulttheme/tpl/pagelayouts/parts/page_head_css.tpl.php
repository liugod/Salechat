<?php if (erConfigClassLhConfig::getInstance()->getDirLanguage('dir_language') == 'ltr' || erConfigClassLhConfig::getInstance()->getDirLanguage('dir_language') == '') : ?>
    <!-- TailwindCSS CDN for modern interface -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#4f46e5',
                        secondary: '#6b7280',
                        success: '#059669',
                        warning: '#d97706',
                        danger: '#dc2626',
                        info: '#0891b2',
                        dark: '#1e293b',
                        'body-color': '#64748b',
                        'title-color': '#0f172a',
                        stroke: '#e2e8f0',
                        'gray-light': '#f8fafc',
                        'gray-dark': '#1e293b',
                        'gray-darker': '#0f172a',
                    },
                    fontFamily: {
                        'outfit': ['Outfit', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <!-- Alpine.js for interactivity -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php if (!isset($Result['anonymous']) && (int)erLhcoreClassModelUserSetting::getSetting('dark_mode',0) == 1) : ?>

        <link rel="stylesheet" type="text/css" href="<?php echo erLhcoreClassDesign::designCSS('vendor/bootstrap/css/bootstrap.min.css;css/material_font.css;css/app.css;css/app-dark.css;css/tailadmin-compiled.css;css/override.css;css/datepicker.css;css/gbot.css;css/color-picker.css');?>" />
    <?php else : ?>
        <link rel="stylesheet" type="text/css" href="<?php echo erLhcoreClassDesign::designCSS('vendor/bootstrap/css/bootstrap.min.css;css/material_font.css;css/app.css;css/tailadmin-compiled.css;css/override.css;css/datepicker.css;css/gbot.css;css/color-picker.css');?>" />
    <?php endif; ?>
<?php else : ?>
<link rel="stylesheet" type="text/css" href="<?php echo erLhcoreClassDesign::designCSS('vendor/bootstrap/css/bootstrap.min.css;css/bootstrap-rtl.min.css;css/material_font.css;css/app.css;css/app-rtl.css;css/tailadmin-compiled.css;css/override_rtl.css;css/datepicker.css;css/gbot.css;css/color-picker.css');?>" />

<?php endif;?>
<?php echo isset($Result['additional_header_css']) ? $Result['additional_header_css'] : ''?>