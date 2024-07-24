<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Additional custom styles if needed */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="relative isolate overflow-hidden bg-gray-900 min-h-screen py-16 sm:py-24 lg:py-32">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="w-full h-full bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Enter the Otp:</h2>
                    <form action="{{ url('/verify-otp') }}" method="POST" class="mt-6 flex max-w-md gap-x-4">
                        @csrf
                        <label for="otp" class="sr-only">OTP</label>
                        <input id="otp" name="otp" type="text" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter the OTP code">
                        <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
