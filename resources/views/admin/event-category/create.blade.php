@extends('layouts.admin')
@section('content')

<!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Add Event Category</h4>

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
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Add</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid lg:grid-cols-2 gap-2">
        <div class="lg:col-span-2">
            <div class="card">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="card-title mb-0">Create New Event Category</h4>
                        <a href="{{ route('admin.event-categories.index') }}" class="btn bg-secondary text-white">
                            <i class="ri-arrow-left-line mr-1"></i> Back to Categories
                        </a>
                    </div>

                    <div class="pt-5">
                        <form action="{{ route('admin.event-categories.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="category_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" name="category_name" id="category_name"
                                        class="form-input @error('category_name') border-red-500 @enderror"
                                        placeholder="e.g. Music Concerts" value="{{ old('category_name') }}" >
                                    @error('category_name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="category_status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status <span
                                            class="text-red-500">*</span></label>
                                    <select name="category_status" id="category_status"
                                        class="form-select @error('category_status') border-red-500 @enderror" >
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="active" {{ old('category_status') == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive"
                                            {{ old('category_status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('category_status')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2">
                                    <label for="category_image" class="mb-2">Category Image</label>
                                    <input type="file" name="category_image" class="form-input" id="category_image"
                                        accept="image/*" required>
                                    @error('category_image')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> <!-- end grid -->

                            <div class="flex justify-end mt-6 space-x-3">
                                <button type="reset" class="btn bg-secondary text-white">
                                    <i class="ri-close-line mr-1"></i> Reset
                                </button>
                                <button type="submit" class="btn bg-primary text-white">
                                    <i class="ri-add-line mr-1"></i> Create Category
                                </button>
                            </div>
                            <!-- end button -->
                        </form> <!-- end form -->
                    </div>
                </div>
            </div> <!-- end card -->
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