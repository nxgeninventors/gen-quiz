<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Quizzes') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('tests.index')}}" title="{{ __('Update quiz') }}">{{ __('<< Back to all tests') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden" id="create_quiz">

        <form method="POST" action="{{ route('tests.update', $quiz->id) }}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')

            <div class="py-2">
                <x-admin.form.label for="quiz_name" class="{{$errors->has('quiz_name') ? 'text-red-400' : ''}}">{{ __('Test name') }}</x-admin.form.label>

                <x-admin.form.input id="quiz_name" class="{{$errors->has('quiz_name') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="quiz_name"
                                    value="{{ old('quiz_name', $quiz->quiz_name) }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="quiz_image" class="{{$errors->has('quiz_image') ? 'text-red-400' : ''}}">{{ __('Test image') }}</x-admin.form.label>

                <x-admin.form.input id="quiz_image" class="{{$errors->has('quiz_image') ? 'border-red-400' : ''}}"
                                    type="file"
                                    accept="image/*"
                                    name="quiz_image"
                                    />

                <div id="imagePreviewContainer">
                    @if ($quiz->quiz_image)
                        <img src="{{ asset('storage/quiz/'.$quiz->quiz_image)  }}">
                    @endif
                </div>
            </div>

            <div class="py-2">
                <x-admin.form.label for="quiz_type" class="{{$errors->has('quiz_type') ? 'text-red-400' : ''}}">{{ __('Test Type') }}</x-admin.form.label>
                <x-select name="quiz_type" class="{{$errors->has('quiz_type') ? 'border-red-400' : ''}}">
                    <option value="1">Choose Test Type</option>
                    @foreach ($quiz_types as $quiz_type)
                    <option {{ old('quiz_type', $quiz->quiz_type) == $quiz_type ? 'selected' : '' }} value="{{ $quiz_type }}">{{ $quiz_type }}</option>
                    @endforeach
                </x-select>
            </div>


            <div class="py-2">
                <x-admin.form.label for="quiz_category_id" class="{{$errors->has('quiz_category_id') ? 'text-red-400' : ''}}">{{ __('Test category name') }}</x-admin.form.label>
                <x-select name="quiz_category_id" class="{{$errors->has('quiz_category_id') ? 'border-red-400' : ''}}">
                    <option value="1">Choose Test category</option>
                    @foreach ($quizCategories as $quizCategory)
                    <option {{ old('quiz_category_id', $quiz->quiz_category_id) == $quizCategory->id ? 'selected' : '' }}  value="{{ $quizCategory->id }}">{{ $quizCategory->name }}</option>
                    @endforeach
                </x-select>
            </div>


            <div class="py-2">
                <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>
                <x-textarea name="description" rows="4">{{ old('description', $quiz->description) }}</x-textarea>
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update Quiz') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>