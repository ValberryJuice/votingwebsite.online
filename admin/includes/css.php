<script src="<?php echo PROJECT_URL; ?>assets/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {"families":["Open+Sans:300,400,600,700"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?php echo PROJECT_URL; ?>assets/css/fonts.css']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<link rel="stylesheet" href="<?php echo PROJECT_URL; ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo PROJECT_URL; ?>assets/css/azzara.min.css">
<link rel="stylesheet" href="<?php echo PROJECT_URL; ?>assets/css/demo.css">