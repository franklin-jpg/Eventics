@extends('layouts.admin')
@section('content')
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Edit Event Category</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="{{ route('admin.event-categories.index') }}"
                    class="text-sm font-medium text-slate-700 dark:text-slate-400">Event Categories</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400"
                    aria-current="page">Edit</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="card-title mb-0">Edit Event Category</h4>
                    <a href="{{ route('admin.event-categories.index') }}" class="btn bg-secondary text-white">
                        <i class="ri-arrow-left-line mr-1"></i> Back to Categories
                    </a>
                </div>

                <div class="pt-5">
                    <form action="{{ route('admin.event-categories.update', $eventCategory) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                    Image</label>
                                <div class="flex items-center justify-start w-full">
                                    <label for="category_image"
                                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-dashed rounded-lg cursor-pointer overflow-hidden border-gray-300 dark:border-gray-600 hover:border-primary dark:hover:border-primary transition-colors duration-200">
                                        @if ($eventCategory->image)
                                            <img id="current-image" class="w-full h-full rounded-lg object-cover object-center "
                                                src="{{ Storage::url('category_image/' . $eventCategory->image) }}"
                                                alt="Current category image">
                                        @else
                                            <span id="upload-placeholder" class="text-gray-500 dark:text-gray-400">Click to upload an image</span>
                                        @endif
                                        <img id="preview-image" class="h-full w-full rounded-lg object-cover hidden"
                                            src="" alt="Category image preview">
                                        <input id="category_image" name="category_image" type="file" class="hidden"
                                            accept="image/*" />
                                    </label>
                                </div>
                                @error('category_image')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Leave empty to keep current image.</p>
                            </div>

                            <div>
                                <label for="category_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="category_name" id="category_name"
                                    class=" w-full text-gray-800 !bg-none @error('category_name') border-red-500 @enderror"
                                    placeholder="e.g. Music Concerts"
                                    value="{{ old('category_name', $eventCategory->name) }}" required>
                                @error('category_name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="category_status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status <span
                                        class="text-red-500">*</span></label>
                                <select name="category_status" id="category_status"
                                    class="form-select @error('category_status') border-red-500 @enderror" required>
                                    <option value="" disabled>Select Status</option>
                                    <option value="active"
                                        {{ old('category_status', $eventCategory->status) == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive"
                                        {{ old('category_status', $eventCategory->status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('category_status')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-6 space-x-3">
                            <a href="{{ route('admin.event-categories.index') }}" class="btn bg-secondary text-white">
                                <i class="ri-close-line mr-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn bg-primary text-white">
                                <i class="ri-save-line mr-1"></i> Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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