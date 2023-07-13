<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Assign Test') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('users.index')}}" title="{{ __('Assign Test') }}">{{ __('<< Back to all users') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('assign-test.update', $user->id) }}">
            @csrf
            @method('PUT')
            
            <div class="py-2">
                <x-admin.form.label for="name">{{ __('User') }}</x-admin.form.label>

                <x-admin.form.input 
                    readonly id="name" 
                    type="text"
                    name="name"
                    value="{{ $user->name }}"
                />
            </div>

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            
            <div class="py-2">
                <x-admin.form.label for="quiz_ids" class="{{$errors->has('quiz_ids') ? 'text-red-400' : ''}}">{{ __('Tests') }}</x-admin.form.label>
                <x-select multiple id="quiz_ids" name="quiz_ids[]" class="{{$errors->has('quiz_ids') ? 'border-red-400' : ''}}">
                    <option>Choose Tests</option>
                    @foreach ($tests as $test)
                    <option {{ in_array($test->id, $userQuizIds) ? 'selected' : '' }}  value="{{ $test->id }}">{{ $test->quiz_name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Assign') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
