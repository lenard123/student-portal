<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= teacher_title(@$title) ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>

<div class="drawer drawer-mobile">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-center justify-center">
    <!-- Page content here -->
    <?php include 'navbar.php' ?>
    <main class="flex-grow bg-base-200 w-full overflow-y-auto">
      <?= $slot ?>
    </main>
  </div> 
  <div class="drawer-side shadow-lg">
    <label for="my-drawer-2" class="drawer-overlay"></label> 
    <div class="w-80 bg-base-100 z-10">

      <div class="flex items-center gap-2 p-4 shadow-md  border-gray-200 mb-2 h-16">
          <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
          <span class="text-xl font-bold">Teachers Portal</span>
      </div>

      <ul class="menu p-4 overflow-y-auto text-base-content">
        <li><a href="<?= url('teacher') ?>">Classes</a></li>
        <li><a href="<?= url('teacher/events.php') ?>">Events</a></li>
        <li><a href="<?= url('teacher/announcements.php') ?>">Announcements</a></li>
      </ul>
    </div>
  
  </div>
</div>
<?= @getSlot('body_end') ?>
<?= component('layouts/scripts', ['libs' => @$libs, 'srcs' => @$srcs]) ?>

</body>
</html>