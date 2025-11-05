<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EventFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .password-toggle {
            cursor: pointer;
            transition: all 0.3s;
        }

        .password-toggle:hover {
            color: #4f46e5;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .animation-pulse-slow {
            animation: pulse-slow 3s infinite;
        }

        @keyframes pulse-slow {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="flex flex-col md:flex-row w-full max-w-6xl bg-white rounded-2xl shadow-2xl overflow-hidden">
        <!-- Left Side - Image -->
        <div class="md:w-1/2 relative hidden md:block">
            <div class="absolute inset-0 gradient-bg opacity-90"></div>
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80"
                alt="Event registration" class="w-full h-full object-cover">

            <div class="absolute inset-0 flex flex-col justify-center items-center text-white p-10">
                <h1 class="text-4xl font-bold mb-4">Join EventFlow</h1>
                <p class="text-xl text-center">Your premier platform for discovering and booking events. Create an
                    account to get started.</p>

                <div class="mt-10 bg-white bg-opacity-20 backdrop-blur-sm p-6 rounded-2xl w-full max-w-md">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <p>Access thousands of events</p>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <p>Save your favorite events</p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                            <i class="fas fa-bell"></i>
                        </div>
                        <p>Get personalized recommendations</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="md:w-1/2 p-8 md:p-12">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800"> Reset your Password </h2>
                <p class="text-gray-600 mt-2">Enter and confirm new password to reset your password</p>
            </div>

            <form class="space-y-6" action="{{ route('reset.password.submit', ['token' => $token]) }}" method="POST">
                @csrf
               

               

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="pl-10 pr-10 form-input block w-full rounded-lg border-gray-300 bg-gray-50 py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Create a password">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="password-toggle fas fa-eye-slash text-gray-400" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-gray-500">
                        <p>Must be at least 8 characters with one uppercase, one number</p>
                    </div>
                     @error('password')
                        <span class="mt-1 text-sm text-red-700">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="confirmPassword" name="password_confirmation" 
                            class="pl-10 pr-10 form-input block w-full rounded-lg border-gray-300 bg-gray-50 py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Confirm your password">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="password-toggle fas fa-eye-slash text-gray-400" id="toggleConfirmPassword"></i>
                        </div>
                    </div>
                     @error('password_confirmation')
                        <span class="mt-1 text-sm text-red-700">{{ $message }}</span>

                        @enderror
                </div>
                <!-- Submit Button -->
                <button type="submit"
                    class="animation-pulse-slow w-full gradient-bg text-white py-3 px-4 rounded-lg font-medium hover:opacity-90 transition duration-300 flex items-center justify-center">
                    <span>Submit</span>
                    <i class="fas fa-arrow-right ml-2"></i>

                </button>
              


            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-4 text-gray-500">or</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>


            <!-- Login Link -->
            <div class="mt-8 text-center">
                <p class="text-gray-600"> have you remembered your password?
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">log in</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggling
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    @if (session('success') || session('error') || session(key: 'info') || session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if (session('success'))
                    iziToast.success({
                        title: 'Success',
                        message: @json(session('success')),
                        position: 'topRight',
                        timeout: 5000,
                        pauseOnHover: true,
                        progressBar: true,
                        animateInside: true,
                        transitionIn: 'fadeInLeft',
                        transitionOut: 'fadeOutRight'
                    });
                @elseif (session('error'))
                    iziToast.error({
                        title: 'Error',
                        message: @json(session('error')),
                        position: 'topRight',
                        timeout: 5000,
                        pauseOnHover: true,
                        progressBar: true,
                        animateInside: true,
                        transitionIn: 'fadeInLeft',
                        transitionOut: 'fadeOutRight'
                    });
                @elseif (session('info'))
                    iziToast.info({
                        title: 'Info',
                        message: @json(session('info')),
                        position: 'topRight',
                        timeout: 5000,
                        pauseOnHover: true,
                        progressBar: true,
                        animateInside: true,
                        transitionIn: 'fadeInLeft',
                        transitionOut: 'fadeOutRight'
                    });
                @elseif (session('warning'))
                    iziToast.warning({
                        title: 'Warning',
                        message: @json(session('warning')),
                        position: 'topRight',
                        timeout: 5000,
                        pauseOnHover: true,
                        progressBar: true,
                        animateInside: true,
                        transitionIn: 'fadeInLeft',
                        transitionOut: 'fadeOutRight'
                    });
                @endif
                });
        </script>
    @endif

</body>

</html>