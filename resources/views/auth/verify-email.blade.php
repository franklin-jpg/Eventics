<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EventFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
   
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    
<div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden">
    <!-- Left Side - Image -->
    <div class="md:w-1/2 relative hidden md:block">
        <div class="absolute inset-0 gradient-bg opacity-90"></div>
        <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
            alt="Email verification" class="w-full h-full object-cover">

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white p-10">
            <div class="text-center">
                <div
                    class="w-20 h-20 rounded-full bg-white bg-opacity-20 backdrop-blur-sm mx-auto mb-6 flex items-center justify-center">
                    <i class="fas fa-envelope-open text-3xl"></i>
                </div>
                <h1 class="text-4xl font-bold mb-4">Check Your Email</h1>
                <p class="text-xl text-center mb-8">We've sent a verification code to your email address. Enter it below
                    to verify your account.</p>
            </div>

            <div class="bg-white bg-opacity-20 backdrop-blur-sm p-6 rounded-2xl w-full max-w-md">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <p>Secure verification</p>
                </div>
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <p>Code expires in 15 minutes</p>
                </div>
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                        <i class="fas fa-redo"></i>
                    </div>
                    <p>Resend if needed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Form -->
    <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-full gradient-bg mx-auto mb-4 flex items-center justify-center">
                <i class="fas fa-key text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Verify Your Email</h2>
            <p class="text-gray-600">We sent a verification code to:</p>
            <p id="user-email" class="font-semibold text-gray-800 mt-1">{{ $email }}</p>
        </div>

        <form action="{{ route('user.verify-otp', $token) }}"  method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <!-- OTP Input Fields -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-4 text-center">Enter 6-digit verification
                    code</label>

                <input type="text" name="otp"
                    class="pl-10 pr-10 form-input block w-full rounded-lg border-gray-300 bg-gray-50 py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Enter OTP">
            </div>

            <!-- Timer Display -->
            <div class="text-center">
                <div id="timer" class="text-sm text-gray-600 mb-4">
                    <i class="fas fa-clock mr-1"></i>
                    Code expires in: <span id="countdown" class="font-semibold text-indigo-600">2:00</span>
                </div>
            </div>

            <!-- Verify Button -->
            <button type="submit"
                class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-medium transition duration-300 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                <span>Verify Code</span>
                <i class="fas fa-check ml-2"></i>
            </button>

            <!-- Resend Code -->
            <div class="text-center">
                <p class="text-gray-600 text-sm mb-3">Didn't receive the code?</p>
                <button type="button" id="resendBtn"
                    class="text-indigo-600 hover:text-indigo-500 font-medium text-sm cursor-pointer">
                    <i class="fas fa-redo mr-1"></i>
                    Resend Code
                </button>
            </div>
        </form>

        <!-- Back to Registration -->
        <div class="mt-8 text-center border-t border-gray-200 pt-6">
            <p class="text-gray-600 text-sm">
                Wrong email address?
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Go back to registration
                </a>
            </p>
        </div>
    </div>
</div>

<style>
    .otp-input:focus {
        transform: scale(1.05);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .animation-pulse-slow {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    @if (session('success') || session('error') || session('info') || session('warning'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mask Email
        // function maskEmail(email) {
        //     const [local, domain] = email.split('@');
        //     const visiblePart = local.slice(0, 1); // Show first letter
        //     const maskedPart = '*'.repeat(local.length - 1);
        //     return `${visiblePart}${maskedPart}@${domain}`;
        // }

        // const emailElement = document.getElementById("user-email");
        // if (emailElement) {
        //     const actualEmail = emailElement.textContent.trim();
        //     emailElement.textContent = maskEmail(actualEmail);
       // }


        

        // iziToast Messages
        @if (session('success'))
            iziToast.success({
                title: 'Success',
                message: @json(session('success')),
                position: 'topRight',
                timeout: 5000
            });
        @elseif (session('error'))
            iziToast.error({
                title: 'Error',
                message: @json(session('error')),
                position: 'topRight',
                timeout: 5000
            });
        @elseif (session('info'))
            iziToast.info({
                title: 'Info',
                message: @json(session('info')),
                position: 'topRight',
                timeout: 5000
            });
        @elseif (session('warning'))
            iziToast.warning({
                title: 'Warning',
                message: @json(session('warning')),
                position: 'topRight',
                timeout: 5000
            });
        @endif


    });

    



        </script>
    @endif

    <script>
document.addEventListener('DOMContentLoaded', function () {
    let timerInterval;
    let expiresAt; // expiry timestamp in ms
    const countdownElement = document.getElementById("countdown");
    const resendBtn = document.getElementById("resendBtn");

    // === Mask email ===
    function maskEmail(email) {
        const [local, domain] = email.split('@');
        const visiblePart = local.slice(0, 1);
        const maskedPart = '*'.repeat(Math.max(local.length - 1, 1));
        return `${visiblePart}${maskedPart}@${domain}`;
    }
    const emailElement = document.getElementById("user-email");
    if (emailElement) {
        const actualEmail = emailElement.textContent.trim();
        emailElement.textContent = maskEmail(actualEmail);
    }

    // === Countdown logic ===
    function startCountdown(expiryMs) {
        expiresAt = expiryMs;
        if (timerInterval) clearInterval(timerInterval);

        function updateCountdown() {
            const now = Date.now();
            const distance = expiresAt - now;

            if (distance <= 0) {
                countdownElement.innerHTML = "Expired";
                clearInterval(timerInterval);
                resendBtn.disabled = false; // enable resend
                return;
            }

            const minutes = Math.floor(distance / 1000 / 60);
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            countdownElement.innerHTML = `${minutes}:${String(seconds).padStart(2, '0')}`;
        }

        resendBtn.disabled = true; // lock resend until expired
        updateCountdown();
        timerInterval = setInterval(updateCountdown, 1000);
    }

    // === Initialize countdown from server ===
    const expiresAtRaw = @json($otpExpiresAt);
    const initialExpiry = expiresAtRaw ? Date.parse(expiresAtRaw) : NaN;
    if (!expiresAtRaw || isNaN(initialExpiry)) {
        countdownElement.innerHTML = "Expired";
        resendBtn.disabled = false;
    } else {
        startCountdown(initialExpiry);
    }

    // === Resend OTP logic ===
    resendBtn.addEventListener("click", function () {
        resendBtn.disabled = true;

        fetch("{{ route('user.resend-otp', $token) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({})
        })
        .then(async (response) => {
            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.error || "Failed to resend OTP.");
            }

            iziToast.success({
                title: 'Success',
                message: data.success,
                position: 'topRight'
            });

            if (data.otpExpiresAt) {
                const newExpiry = Date.parse(data.otpExpiresAt);
                startCountdown(newExpiry); // reset fresh with new server expiry
            }
        })
        .catch(error => {
            iziToast.error({
                title: 'Error',
                message: error.message || "Something went wrong. Try again.",
                position: 'topRight'
            });
            resendBtn.disabled = false;
        });
    });
});
</script>
</body>
</html>