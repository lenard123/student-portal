<header class="navbar bg-base-100 shadow-md">

    <!-- Left -->
    <div class="flex-1">

        <a href="<?= url('student') ?>" class="btn btn-ghost normal-case text-xl space-x-2">
            <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
            <span>Student Portal</span>
        </a>

        <ul class="hidden md:flex menu menu-horizontal p-0">
            <li><a href="<?= url('student') ?>">Classes</a></li>
            <li><a href="<?= url('student/events.php') ?>">Events</a></li>
            <li><a href="<?= url('student/announcements.php') ?>">Announcements</a></li>
            <li><a href="<?= url('student/messages.php') ?>">Messages</a></li>
        </ul>

    </div>


    <!-- Right -->
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0">
                <div class="avatar">
                    <div class="w-12 rounded-full">
                        <img src="<?= Auth::user()->avatar_url ?>" />
                    </div>
                </div>
            </div>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow-lg bg-base-100 rounded-box w-52">
                <li><a href="<?= url('logout.php') ?>">Sign Out</a></li>
            </ul>
        </div>
    </div>
</header>
