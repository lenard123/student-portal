<?php
$library = [
    'axios' => asset('js/libs/axios.js'),
];

$srcs = is_array(@$srcs) 
            ? $srcs
            : (is_null(@$srcs) ? [] : [$srcs]);

?>

<?php foreach ($libs ?? [] as $lib) : ?>
    <script src="<?= $library[$lib] ?>"></script>
<?php endforeach ?>

<script type="text/javascript">
    window.ROLE_STUDENT = <?= json_encode(User::ROLE_STUDENT) ?>;
    window.ROLE_TEACHER = <?= json_encode(User::ROLE_TEACHER) ?>;
    window.ROLE_ADMIN = <?= json_encode(User::ROLE_ADMIN) ?>;
    window.GENDER_MALE = <?= json_encode(User::GENDER_MALE) ?>;
    window.GENDER_FEMALE = <?= json_encode(User::GENDER_FEMALE) ?>;
    window.API_URL = <?= json_encode(url('api')) ?>;
    window.BASE_URL = <?= json_encode(url()) ?>;

    if (window.axios)
        window.axios.defaults.baseURL = window.API_URL;
</script>

<?php foreach ($srcs as $src) : ?>
    <script type="module" src="<?= asset("js/{$src}.js") ?>"></script>
<?php endforeach ?>