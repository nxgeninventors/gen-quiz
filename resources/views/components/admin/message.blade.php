@if(session()->has('message') || session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        <span class="font-medium">
            {{ session()->get('message') ?? session()->has('success') }}
        </span>
    </div>
@endif

@if(session()->has('error'))
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <span class="font-medium">
            {{ session()->get('error') }}
        </span>
    </div>
@endif