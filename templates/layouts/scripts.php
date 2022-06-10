<script src="<?= asset('js/axios.js') ?>"></script>
<script type="text/javascript">
    window.axios.defaults.baseURL = <?= json_encode(url('api')) ?>
</script>

<?php if (isset($src)) : ?>
    <script type="module" src="<?= asset("js/{$src}.js") ?>"></script>
<?php endif ?>