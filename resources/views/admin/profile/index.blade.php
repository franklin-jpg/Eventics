@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-orange-500 dark:bg-gray-880 text-slate-900 dark:text-slate-100 p-6 transition-colors duration-300">

    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <h4 class="text-xl font-semibold text-slate-900 dark:text-white">Update Profile</h4>
        <div class="hidden md:flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
            <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">Attex</a>
            <i class="ri-arrow-right-s-line text-base"></i>
            <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">Menu</a>
            <i class="ri-arrow-right-s-line text-base"></i>
            <span class="font-medium text-blue-600 dark:text-blue-400">Dashboard</span>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 space-y-10">
        <!-- Profile Image -->
        <div class="flex flex-col items-center">
            <div class="relative  p-[7]">
                <img src="{{ asset(auth()->user()->profileImageUrl()) }}"
                     alt="Profile Picture"
                     class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 shadow-md">
                <label for="profile_image" class="absolute bottom-0 right-0 bg-blue-600 hover:bg-blue-700 text-gray-400 p-2 rounded-full cursor-pointer shadow">
                    <i class="ri-camera-fill dark:text-white" style="font-size: 1.5rem;"></i>
                </label>
            </div>
        </div>

        <!-- Update Info Form -->
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <input type="file" id="profile_image" name="profile_image" class="hidden">
            @error('profile_image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm p-4 font-medium mb-1">Name:</label>
                    <input type="text" name="name" maxlength="90" 
                        value="{{ old('name', auth()->user()->name) }}"
                        class="w-full px-4 p1-4 py-2 border border-slate-300 dark:border-slate-600  dark:text-white   rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 p-4">Email:</label>
                    <input type="email" name="email" maxlength="90"
                        value="{{ old('email', auth()->user()->email) }}"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 p-4">Phone:</label>
                    <input type="number" name="phone" maxlength="90"
                        value="{{ old('phone', auth()->user()->profile?->phone) }}"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600  dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                    @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 p-4">Address:</label>
                    <input type="text" name="address" maxlength="90"
                        value="{{ old('address', auth()->user()->profile?->address) }}"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-gray-800  dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                    @error('address') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-black  dark:text-white px-6 py-2.5 rounded-lg shadow-md transition">
                    Save Changes
                </button>
            </div>
        </form>

        <!-- Password Update -->
        <div class="border-t border-slate-200 dark:border-slate-700 pt-8">
            <h2 class="text-lg font-semibold mb-4 dark:text-white p-3">Update Password</h2>
            <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium mb-1 p-3">Current Password:</label>
                    <input type="password" name="current_password" maxlength="90"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                          @error('current_password') <p class="text-red-500 text-sm">{{ $message }}</p> 
                          @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 p-3">New Password:</label>
                    <input type="password" name="new_password" maxlength="90"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                          @error('new_password') <p class="text-red-500 text-sm">{{ $message }}</p> 
                          @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 p-3">Confirm Password:</label>
                    <input type="password" name="new_password_confirmation" maxlength="90"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800">
                          @error('new_password_confirmation') <p class="text-red-500 text-sm">{{ $message }}</p> 
                          @enderror
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-black   dark:text-white px-6 py-2.5 rounded-lg shadow-md transition">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


















{{-- @extends('layouts.admin')

@section('content')
<div class="min-h-screen  dark:bg-slate-900 text-slate-900 dark:text-slate-100 p-6 transition-colors duration-300">
    <div class="max-w-2xl mx-auto  dark:bg-slate-800 shadow-lg rounded-2xl p-8">
        <h4 class="text-xl font-semibold mb-8 text-slate-800 dark:text-slate-100">Update Profile</h4>

        <!-- Profile Image Section -->
        <div class="flex flex-col items-center mb-8 group relative">
            <div class="relative">
                <img src="{{ asset(auth()->user()->profileImageUrl()) }}" 
                     alt="Profile Photo"
                     class="w-28 h-28 rounded-full object-cover border-4 border-slate-200 dark:border-slate-700">
                
                <!-- Hover Overlay -->
                <label for="profile_image" 
                    class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition cursor-pointer">
                    Change Profile Photo
                </label>
                <form id="imageForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="hidden">
                    @csrf
                    @method('PATCH')
                    <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="document.getElementById('imageForm').submit();">
                </form>
            </div>
        </div>

        <!-- Profile Update Form -->
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">Name</label>
                <div class="flex items-center gap-2">
                    <i class="fas fa-user text-slate-500"></i>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="w-full bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-100 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">Email</label>
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope text-slate-500"></i>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        class="w-full bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-100 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">Phone</label>
                <div class="flex items-center gap-2">
                    <i class="fas fa-phone text-slate-500"></i>
                    <input type="number" name="phone" value="{{ old('phone', auth()->user()->profile?->phone) }}"
                        class="w-full bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-100 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    <button type="button" onclick="copyText(this)" data-value="{{ old('phone', auth()->user()->profile?->phone) }}"
                        class="text-slate-500 hover:text-green-600 transition"><i class="fas fa-copy"></i></button>
                </div>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">Address</label>
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-slate-500"></i>
                    <input type="text" name="address" value="{{ old('address', auth()->user()->profile?->address) }}"
                        class="w-full bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-100 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    <button type="button" onclick="copyText(this)" data-value="{{ old('address', auth()->user()->profile?->address) }}"
                        class="text-slate-500 hover:text-green-600 transition"><i class="fas fa-copy"></i></button>
                </div>
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-orange-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                    Update Profile
                </button>
            </div>
        </form>

        <!-- Update Password -->
        <div class="mt-10 border-t border-slate-200 dark:border-slate-700 pt-6">
            <h2 class="font-semibold text-lg mb-4">Update Password</h2>
            <form method="POST" action="" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">Current Password</label>
                    <input type="password" name="current_password"
                        class="w-full bg-slate-50 dark:bg-slate-700 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">New Password</label>
                    <input type="password" name="password"
                        class="w-full bg-slate-50 dark:bg-slate-700 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full bg-slate-50 dark:bg-slate-700 rounded-lg px-3 py-2 border border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <button type="submit" class="bg-blue-600 text-orange-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                    Update Password
                </button>
            </form>
        </div>
    </div>
</div>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a2d9a66e52.js" crossorigin="anonymous"></script>

<script>
function copyText(btn) {
    const text = btn.getAttribute('data-value');
    navigator.clipboard.writeText(text).then(() => {
        btn.innerHTML = '<i class="fas fa-check text-green-600"></i>';
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-copy"></i>';
        }, 1500);
    });
}
</script>
@endsection --}}
