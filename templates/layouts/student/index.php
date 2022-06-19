<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= student_title(@$title) ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
<div class="drawer drawer-mobile">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-center justify-center">
    <!-- Page content here -->
    <?= component('layouts/student/navbar') ?>
    <main class="flex-grow overflow-y-auto bg-base-200 w-full">
      <?= $slot ?>
    </main>
  </div> 
  <div class="drawer-side shadow-lg">
    <label for="my-drawer-2" class="drawer-overlay"></label> 
    <div class="w-80 bg-base-100 z-10">

      <div class="flex items-center gap-2 p-4 shadow-md  border-gray-200 mb-2 h-16">
          <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
          <span class="text-xl font-bold">Student Portal</span>
      </div>

      <ul class="menu p-4 overflow-y-auto text-base-content">
        <li><a href="<?= url('student') ?>">Classes</a></li>
        <li><a href="<?= url('student/events.php') ?>">Events</a></li>
        <li><a href="<?= url('student/announcements.php') ?>">Announcements</a></li>
        <li><a href="<?= url('student/messages.php') ?>">Messages</a></li>
        <li><a href="<?= url('student/archives.php') ?>">Archived Class</a></li>
        <li><a href="<?= url('student/settings.php') ?>">Settings</a></li>
      </ul>
    </div>
  
  </div>
</div>

<?= @$slots['body_end'] ?>

<?= component('layouts/scripts', ['libs' => @$libs, 'srcs' => @$srcs]) ?>

</body>
</html>