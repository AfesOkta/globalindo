<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= $assets['jquery_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['bootstrap_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_migrate_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_ui_js'] ?> " type="text/javascript"></script>
<script src="<?= $assets['twitter_bootstrap_hover_dropdown_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['excanvas_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['respond_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_slimscroll_js'] ?> " type="text/javascript"></script>
<script src="<?= $assets['jquery_blockui_js'] ?> " type="text/javascript"></script>
<script src="<?= $assets['jquery_cookie_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_uniform_js'] ?>" type="text/javascript"></script>

<script src="<?= $assets['jqvmap_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jqvmap_rusia_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jqvmap_world_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jqvmap_europe_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jqvmap_germany_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jqvmap_sampledata_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jqvmap_usa_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_flot_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_flot_resize_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_pulsate_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['bootstrap_daterangepicker_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['daterangepicker_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_gritter_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['fullcalendar_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_easy_pie_chart_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_sparkline_min_js'] ?>" type="text/javascript"></script>

<script src="<?= $assets['jquery_validation_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['jquery_backstretch_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['select2_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['app_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['index_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['task_js'] ?>" type="text/javascript"></script>
<script src="<?= $assets['swal_js'] ?>" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    App.init(); // initlayout and core plugins
    Index.init();
    Index.initJQVMAP(); // init index page's custom scripts
    Index.initCalendar(); // init index page's custom scripts
    Index.initCharts(); // init index page's custom scripts
    Index.initChat();
    Index.initMiniCharts();
    Index.initDashboardDaterange();
    Index.initIntro();
    Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
<!-- Extra javascript -->
<?php echo $js; ?>
<!-- / -->

<?php if ( ! empty($ga_id)): ?>
<!-- Google Analytics -->
<script>
(function(b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
        function() {
            (b[l].q = b[l].q || []).push(arguments)
        });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = '//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
}(window, document, 'script', 'ga'));
ga('create', '<?php echo $ga_id; ?>');
ga('send', 'pageview');
</script>
<?php endif; ?>
<script type="text/javascript">
$(function() {

    try {
        $("#organisation").orgChart({
            container: $("#orgtree"),
            interactive: true,
            showLevels: 3
        });

    } catch (e) {}
    try {

        var $select = $('.select2').select2({
            placeholder: "Seçiniz",
            allowClear: true
        });
    } catch (e) {}


    try {
        <
        ? php!$this - > data['useDatatables'] || $this - > load - > view(
        'common/_components/datatable_script'); ? >
    } catch (e) {}


    $('nav.menu ul li').hover(
        function() {
            //show its submenu
            $('ul', this).slideDown(150);
        },
        function() {
            //hide its submenu
            $('ul', this).slideUp(150);
        }
    );
});
</script>
</body>

</html>