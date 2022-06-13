<header class="navbar bg-base-100 shadow-md h-16 z-10">

    <!-- Left -->
    <div class="flex-1">

      <label for="my-drawer-2" class="lg:hidden btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
      </label>

    </div>


    <!-- Right -->
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0" class="flex items-center">
                <div class="avatar ">
                    <div class="w-10 rounded-full">
                        <img src="<?= Auth::user()->avatar ?>" />
                    </div>
                </div>
            </div>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow-lg bg-base-100 rounded-box w-52">
                <li><a href="<?= url('logout.php') ?>">Sign Out</a></li>
            </ul>
        </div>
    </div>
</header>
