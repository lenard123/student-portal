<?php

$isActive = function($navLink) use ($active) 
{
  return $navLink == @$active ? 'active': '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <?= component('layouts/headers') ?>
</head>
<body>

<div class="drawer drawer-mobile">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-center justify-center">
    <!-- Page content here -->
    
    <div class="navbar bg-white justify-between lg:justify-end">
        <label for="my-drawer-2" class="lg:hidden btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
        </label>
        <div class="">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="cursor-pointer font-semibold text-gray-600 flex items-center">
                    <img class="w-8 h-8 rounded-full" src="<?= AdminAuth::user()->avatar ?>">
                    <span class="px-2"><?= AdminAuth::user()->firstname ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </label>      
                <div tabindex="0" class="dropdown-content w-[11rem] rounded p-3 mt-2 shadow-lg bg-white border border-gray-300">
                    <span class="block font-bold text-gray-600 leading-3"><?= AdminAuth::user()->fullname ?></span>
                    <span class="text-sm text-gray-600 italic">Administrator</span>

                    <div class="h-[1px] bg-gray-300 my-3 -mx-3"></div>

                    <div class="flex flex-col">
                        <a href="#" class="py-1 text-sm font-semibold text-blue-500 hover:text-blue-700">Settings</a>
                        <a href="<?= url('admin/logout.php') ?>" class="py-1 text-sm font-semibold text-blue-500 hover:text-blue-700">Sign out</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <main class="flex-grow bg-slate-100 w-full overflow-y-auto">
      <?= $slot ?>
    </main>
  </div> 
  <div class="drawer-side shadow-lg">
    <label for="my-drawer-2" class="drawer-overlay"></label> 
    <div class="w-64 bg-slate-800 z-10">

      <div class="flex items-center gap-2 p-4 shadow-md  border-gray-200 mb-2 h-16">
          <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
          <span class="text-xl font-bold">Teachers Portal</span>
      </div>

      <div class="admin-menu p-4 flex flex-col text-slate-200 font-inter gap-1">
        <a class="<?= $isActive('dashboard') ?>" href="<?= url('admin') ?>">Dashboard</a>
        <a href="#">Events</a>
        <a class="<?= $isActive('announcements') ?>" href="<?= url('admin/announcements.php') ?>">Announcements</a>
        <a href="#">Messages</a>
        <a href="#">Settings</a>
      </div>
    </div>
  
  </div>
</div>
<?= @getSlot('body_end') ?>
<?= component('layouts/scripts', ['libs' => @$libs, 'srcs' => @$srcs]) ?>

</body>
</html>