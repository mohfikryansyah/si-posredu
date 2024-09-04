<div class="{{ request()->routeIs('posts.show') ? '' : 'p-4
' }} lg:ml-64">
    <div class="rounded-lg dark:border-gray-700 md:mt-14 mt-16">
        <!-- Page Heading -->
        @isset($header)
            <header class="max-w-full bg-white rounded-lg shadow">
                <div class="py-6 px-4">
                    {{ $header }}
                </div>
            </header>
        @endisset
    </div>

    {{ $slot }}
</div>
