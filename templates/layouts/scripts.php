<script src="<?= asset('js/axios.js') ?>"></script>
<script type="text/javascript">
    window.ROLE_STUDENT = <?= json_encode(User::ROLE_STUDENT) ?>;
    window.ROLE_TEACHER = <?= json_encode(User::ROLE_TEACHER) ?>;
    window.ROLE_ADMIN = <?= json_encode(User::ROLE_ADMIN) ?>;
    window.GENDER_MALE = <?= json_encode(User::GENDER_MALE) ?>;
    window.GENDER_FEMALE = <?= json_encode(User::GENDER_FEMALE) ?>;
    window.API_URL = <?= json_encode(url('api')) ?>;
    window.BASE_URL = <?= json_encode(url()) ?>;
    window.axios.defaults.baseURL = window.API_URL;
</script>

<?php if (isset($src)) : ?>
    <script type="module" src="<?= asset("js/{$src}.js") ?>"></script>
<?php endif ?>