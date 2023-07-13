<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Assign Test') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('users.index')}}" title="{{ __('Assign Test') }}">{{ __('<< Back to all users') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')


            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
