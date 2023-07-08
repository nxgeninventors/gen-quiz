<div
    class="bg-white dark:bg-gray-800 shadow-lg dark:shadow-none rounded-2xl h-80 w-72 m-10 hover:shadow-xl dark:hover:shadow-dark"
>
    <a href="{{ url('quizzes').'/'.$category_id }}">
        <div class="flex justify-center pt-12">
            <img
                src={{ $category_image_path }}
                alt={{ $name }}
                width="180"
                height="180"
            />
        </div>
        <h2 class="text-gray-800 dark:text-gray-300 font-sans font-medium text-xl pt-8 pl-8">
            {{ $name }}
        </h2>
    </a>
</div>