<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ $heading }}</h2>
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    @if(request()->is('register'))
    <form class="space-y-6" action="/register/store" method="post">
      @else
      <form class="space-y-6" action="/login/store" method="post">
        @endif
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 required">
          </div>
        </div>
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            @if(request()->is('login'))
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>
            @endif
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 required">
          </div>
        </div>
        @if (request()->is('register'))
        <x-enter>
          <x-slot:text>Phone Number</x-slot:text>
        </x-enter>
        <label for="dropdown" class="block text-sm font-medium leading-6 text-gray-900">Who do you want to register as?</label>
          <select  id="dropdown" name="role" class="w-full py-2 px-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 border-blue-700">
            <option>Employer or Employee?</option>
            <option  value="employer">Employer</option>
            <option  value="employee">Employee</option>
          </select>
        @endif

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
      @if (request()->is('login'))
      <p class="mt-10 text-center text-sm text-gray-500">
        Not a member?
        <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 cursor-pointer">Register here</a>
      </p>
      @else
      <p class="mt-10 text-center text-sm text-gray-500">Already a member?
        <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login here</a>
      </p>
      @endif
  </div>
</div>