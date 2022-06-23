<div class="bg-base-100 border border-gray-300 rounded-lg p-4">

    <div class="flex gap-4 items-center">
        <div class="avatar self-start">
            <div class="w-12 rounded-full">
                <img src="<?= $teacher->avatar ?>">
            </div>
        </div>
        <div class="flex-grow">
            <div class="font-semibold leading-4"><?= $teacher->fullname ?></div>
            <div class="text-sm text-gray-700"><?= $post->created_at->diffForHumans() ?></div>
        </div>
<!--         <button>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
        </button> -->
    </div>
    <div class="py-4 px-2">
        <p class="font-sans whitespace-pre-wrap"><?= $post->content ?></p>
    </div>

    <div class="px-4 pt-4 border-t border-gray-300 -mx-4">
        <div class="flex gap-2">
            <div class="avatar self-start">
                <div class="w-10 rounded-full">
                    <img src="<?= Auth::user()->avatar ?>">
                </div>
            </div>
            <form class="flex-grow">
                <input type="text" placeholder="Add class comment" class="input input-bordered input-md w-full rounded-full" />
            </form>
        </div>
    </div>

</div>
