<script src="<?= asset('js/axios.js') ?>"></script>
<script type="text/javascript">
    window.API_URL = <?= json_encode(url('api')) ?>;
    window.BASE_URL = <?= json_encode(url()) ?>;
    window.axios.defaults.baseURL = window.API_URL;
</script>

<?php if (isset($src)) : ?>
    <script type="module" src="<?= asset("js/{$src}.js") ?>"></script>
<?php endif ?>