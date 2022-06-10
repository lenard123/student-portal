<header class="navbar bg-base-100 shadow-md">

    <div class="flex-1">

        <button class="md:hidden btn btn-square btn-ghost">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>

        <a href="<?= url() ?>" class="btn btn-ghost normal-case text-xl space-x-2">
            <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
            <span>Student Portal</span>
        </a>

        <ul class="hidden md:flex menu menu-horizontal p-0">
            <li><a href="<?= url() ?>">Home</a></li>
            <li><a href="<?= url('about.php') ?>">About</a></li>
            <li><a href="<?= url('contact.php') ?>">Contact</a></li>
        </ul>

    </div>

    <nav class="flex-none">
        <div class="hidden sm:block">
            <a href="<?= url('login.php') ?>" class="btn btn-ghost">Login</a>
            <a href="<?= url('register.php') ?>" class="btn btn-primary">Register</a>
        </div>

        <button class="sm:hidden btn btn-square btn-ghost">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
        </button>

    </nav>

</header>
