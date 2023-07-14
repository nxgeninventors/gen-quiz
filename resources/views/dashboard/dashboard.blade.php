
<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12"> 
        <x-header class="mt-32 md:mt-48 lg:mt-64">Choose a category to get started:</x-header>
        <div class="flex flex-row flex-wrap justify-center mt-16  mb-32">
            @foreach($categories as $category)
                <x-category-card>
                    <x-slot name="category_id">{{ $category->id }}</x-slot>
                    <x-slot name="name">{{ $category->name }}</x-slot>
                    <x-slot name="category_image_path">{{ $category->category_image_path}}</x-slot>
                </x-category-card>
            @endforeach
        </div>
    </div>
</x-admin.wrapper>