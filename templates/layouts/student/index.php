<div class="drawer drawer-mobile">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-center justify-center bg-base-200">
    <!-- Page content here -->
    <!-- <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label> -->
    <?= component('layouts/student/navbar') ?>
    <div class="flex-grow">

    </div>
  </div> 
  <div class="drawer-side shadow-lg z-10">
    <label for="my-drawer-2" class="drawer-overlay"></label> 

    <div>
        <div class="flex items-center gap-2 p-4 shadow-md  border-gray-200 mb-2 h-16">
            <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
            <span class="text-xl font-bold">Student Portal</span>
        </div>

        <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content">
          <!-- Sidebar content here -->
          <li><a>Classes</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="announcements.php">Announcements</a></li>
          <li><a href="messages.php">Messages</a></li>
        </ul>
    </div>
  
  </div>
</div>
    <?php /*
    <div class="flex flex-col min-h-screen">
        <?= component('layouts/student/navbar') ?>
        <main class="flex-grow bg-base-200">
            <?= $slot ?>
        </main>
    </div>
*/?>