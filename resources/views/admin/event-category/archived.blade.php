@extends('layouts.admin')

@section('content')
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Archived Event Categories</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">
                    Archived Event Categories
                </a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <h4 class="card-title mb-0">All Archived Categories</h4>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.event-categories.index') }}" class="btn bg-primary text-white">
                            <i class="ri-folder-line mr-1"></i> View Active ({{ $activeCount }})
                        </a>
                    </div>
                </div>

                @if ($categories->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Category</th>
                                    <th class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Slug</th>
                                    <th class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Deleted At</th>
                                    <th class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                @if ($category->image)
                                                    <img class="w-10 h-10 rounded-md object-cover"
                                                        src="{{ Storage::url('category-images/' . $category->image) }}"
                                                        alt="{{ $category->name }}">
                                                @else
                                                    <div
                                                        class="w-10 h-10 rounded-md bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                        <i class="ri-image-line text-gray-400"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $category->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $category->slug }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $category->deleted_at->format('d M Y, h:i A') }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-start space-x-3">
                                                <!-- Restore -->
                                                <form action="{{ route('admin.event-categories.restore', $category->id) }}"
                                                    method="POST" class="inline restore-form"
                                                    data-id="{{ $category->id }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="text-green-500 hover:text-green-700 restore-btn"
                                                        title="Restore" data-id="{{ $category->id }}"
                                                        data-name="{{ $category->name }}">
                                                        <i class="ri-arrow-go-back-line text-base"></i>
                                                    </button>
                                                </form>

                                                <!-- Force Delete -->
                                                <form
                                                    action="{{ route('admin.event-categories.force-delete', $category->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                                        onclick="return confirm('Are you sure you want to permanently delete this category?')"
                                                        title="Delete Permanently">
                                                        <i class="ri-delete-bin-line text-base"></i>
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
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Archived Categories Found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">There are no archived event categories.</p>
                        <a href="{{ route('admin.event-categories.index') }}" class="btn bg-primary text-white">
                            <i class="ri-folder-line mr-1"></i> Back to Active
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection