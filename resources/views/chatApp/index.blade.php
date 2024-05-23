<x-admin-panel title="Chat App Page">
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Chat App</h1>
            <nav>
                {{ Breadcrumbs::render('chatApp') }}
            </nav>
        </div><!-- End Page Title -->

        <div id="app">
        </div>
    </main><!-- End #main -->
    @push('custom_js')
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    @endpush
</x-admin-panel>
