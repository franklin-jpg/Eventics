{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        {{ $otp_code }}
    </div>
</body> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your EventFlow OTP Code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-lg mx-auto my-10 bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <!-- Header -->
        <div class="bg-indigo-600 text-white text-center py-6">
            <h1 class="text-2xl font-bold tracking-wide">EventFlow</h1>
            <p class="text-sm opacity-90 mt-1">Secure OTP Verification</p>
        </div>

        <!-- Body -->
        <div class="p-8 text-gray-800">
            <p class="text-lg mb-4">Hi <span class="font-semibold">{{ $user->name ?? 'User' }}</span>,</p>

            <p class="mb-4">We received a request to verify your account on <span class="font-semibold">EventFlow</span>.  
            Please use the One-Time Password (OTP) below to complete your verification:</p>

            <!-- OTP Box -->
            <div class="text-center my-6">
                <div class="inline-block bg-indigo-50 border border-indigo-300 rounded-xl px-8 py-4">
                    <span class="text-3xl font-extrabold text-indigo-700 tracking-widest">{{ $otp_code }}</span>
                </div>
            </div>

            <p class="mb-4">This OTP is valid for the next <strong>10 minutes</strong>.  
            Please do not share it with anyone — EventFlow will never ask for your OTP.</p>

            <p>If you didn’t request this verification, simply ignore this message.</p>

            <div class="mt-8">
                <p>Thanks,</p>
                <p class="font-semibold text-indigo-700">The EventFlow Team</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 border-t border-gray-200 text-center text-sm text-gray-500 py-4">
            <p>Need help? Contact <a href="mailto:support@eventflow.com" class="text-indigo-600 font-medium hover:underline">support@eventflow.com</a></p>
            <p class="mt-1">&copy; {{ date('Y') }} EventFlow. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
