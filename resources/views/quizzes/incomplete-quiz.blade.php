<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Incomplete Tests') }}
    </x-slot>



    <div class="py-2">
        @if ($guest_role && $force)
        <div class="alert alert-error my-4">
            To access additional tests, kindly upgrade your subscription as you have already used your complimentary tests..
        </div>
        @endif
        

        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'quiz_name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Status') }}
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($quizResults as $quizResult)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('tests.show', $quizResult->id)}}" class="no-underline hover:underline text-cyan-600">{{ $quizResult->quiz->quiz_name }}</a>
                            </div>
                        </x-admin.grid.td>

                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                Incomplete
                            </div>
                        </x-admin.grid.td>

                        <x-admin.grid.td>
                            <a href="{{ url('/test').'/'.$category_id.'/'.$quiz_id.'/'.$quizResult->id }}"  class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Continue') }}
                            </a>
                        </x-admin.grid.td>
                    </tr>
                    @endforeach
                    
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="flex justify-center my-8">
            <div class="badge badge-secondary text-sm">OR</div>
        </div>

        <div class="flex justify-center my-8">
            <a href="{{ url('/test').'/'.$category_id.'/'.$quiz_id.'?force=1'}}" class="btn btn-primary">Start New Test</a>
        </div>
    </div>
</x-admin.wrapper>