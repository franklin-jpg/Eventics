@extends('layouts.admin')
@section('content')
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Event Categories</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Event
                    Categories</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <h4 class="card-title mb-0">All Event Categories</h4>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.event-categories.create') }}" class="btn bg-primary text-white">
                            <i class="ri-add-line mr-1"></i> Add New Category
                        </a>
                        <a href="{{ route('admin.event-categories.archived') }}" class="btn bg-info text-white">
                            <i class="ri-archive-drawer-line mr-1"></i> View Archived ({{ $archivedCount }})
                        </a>
                    </div>
                </div>

                @if ($categories->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Category</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Slug</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Status</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($categories as $index => $category)
                                    <tr class="">

                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                @if ($category->image)
                                                    <img class="w-10 h-10 rounded-md object-cover"
                                                        src="{{ Storage::url('category_image/' . $category->image) }}"
                                                        alt="{{ $category->name }}">
                                                @else
                                                    <div
                                                        class="w-10 h-10 rounded-md bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                        <i class="ri-image-line text-gray-400"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $category->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $category->slug }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 py-1  rounded-full bg-black text-xs font-medium
                                        {{ $category->status === 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                                {{ $category->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-start space-x-3">
                                                <a href="{{ route('admin.event-categories.edit', $category) }}"
                                                    class="text-primary hover:text-primary-dark" title="Edit">
                                                    <i class="ri-pencil-line text-base"></i>
                                                </a>
                                                <form action="{{ route('admin.event-categories.destroy', $category) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                                        title="Archive"
                                                        onclick="return confirm('Are you sure you want to archive this category?')">
                                                        <i class="ri-archive-line text-base"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <div
                            class="mx-auto w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-4">
                            <i class="ri-folder-open-line text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Event Categories Found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">Get started by creating your first event category.
                        </p>
                        <a href="{{ route('admin.event-categories.create') }}" class="btn bg-primary text-white">
                            <i class="ri-add-line mr-1"></i> Create New Category
                        </a>
                    </div>
                @endif


            </div>
        </div>
    </div>

    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
        });
    </script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryImage = document.getElementById('category_image');
        const currentImage = document.getElementById('current-image');
        const previewImage = document.getElementById('preview-image');
        const uploadPlaceholder = document.getElementById('upload-placeholder');

        categoryImage.addEventListener('change', function () {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Hide current image or placeholder
                    if (currentImage) {
                        currentImage.style.display = 'none'; // force hide instead of class
                    }
                    if (uploadPlaceholder) {
                        uploadPlaceholder.style.display = 'none';
                    }

                    // Show preview image
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block'; // force show
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>