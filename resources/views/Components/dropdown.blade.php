<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Additional styles if needed */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
     <form method="POST" action="/logout" role="none" >
     @csrf
    <div class="py-6 mt-4 flex items-center justify-between gap-8">
    <h4 class="text-white ">Role: {{ ucfirst(Auth::user()->role) }}</h4>
    <h4 class="text-white ">Logged in as: {{ Auth::user()->email }}</h4>
        <button type="submit" class="-mx-3 block text-white rounded-lg px-3 py-2.5 bg-gray-900  font-semibold leading-7 hover:text-gray-900 hover:bg-gray-50 cursor-pointer">Log Out</button>
    </div>
     </form>
    <!-- <form method="POST" action="/logout" role="none">
        @csrf
        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
    </form> -->
</body>

</html>