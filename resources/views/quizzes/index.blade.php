<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Quizzes') }}
    </x-slot>

    @can('quiz create')
    <x-admin.add-link href="{{ route('tests.create') }}">
        {{ __('Add Test') }}
    </x-admin.add-link>
    @endcan

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.search action="{{ route('tests.index') }}" />
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'quiz_name'])
                        </x-admin.grid.th>
                        @canany(['quiz edit', 'quiz delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($quizzes as $quiz)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('tests.show', $quiz->id)}}" class="no-underline hover:underline text-cyan-600">{{ $quiz->quiz_name }}</a>
                            </div>
                        </x-admin.grid.td>
                        @canany(['quiz edit', 'quiz delete'])
                        <x-admin.grid.td>
                            <form action="{{ route('tests.destroy', $quiz->id) }}" method="POST">
                                <div class="flex">
                                    @can('quiz edit')
                                    <a href="{{route('tests.edit', $quiz->id)}}" class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Edit') }}
                                    </a>
                                    @endcan

                                    @can('quiz delete')
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="window.confirmDelete(event)">
                                        {{ __('Delete') }}
                                    </button>
                                    @endcan
                                </div>
                            </form>
                        </x-admin.grid.td>
                        @endcanany
                    </tr>
                    @endforeach
                    @if($quizzes->isEmpty())
                        <tr>
                            <td colspan="2">
                                <div class="flex flex-col justify-center items-center py-4 text-lg">
                                    {{ __('No Result Found') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="py-8">
            {{ $quizzes->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>