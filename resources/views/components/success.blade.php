<div id="alert" class="alert bg-green-500 shadow-lg max-w-xl text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span> <strong>Success {{ session('message') }}</strong></span>
        </div>
        <div id="close" class="btn btn-sm btn-ghost btn-circle">✕</div>
    </div>
</div>
