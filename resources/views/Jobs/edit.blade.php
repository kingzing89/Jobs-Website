<x-layout>
  <x-slot:heading>Edit the Job: {{$job->Title}}</x-slot:heading>

  <head>
    @vite('resources/css/app.css')
  </head>

  <body>
    <form class="p-16" method="post" action="/jobs/{{$job->id}}">
      @csrf
      @method('PATCH')
      
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Edit a new Job</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you</p>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
              <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input type="text" value="{{$job->Title}}" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Job title" required>
                </div>
                @error('title')
                <li class="text-red-500 italic">{{ $message }}</li>
                @enderror
              </div>
            </div>
            <div class="sm:col-span-4">
              <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
              <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input type="text" value="{{$job->Salary}}" name="salary" id="salary" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="50,000$" required>
                </div>
                @error('salary')
                <li class="text-red-500 italic">{{ $message }}</li>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-6 flex justify-between">
        <div>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
          <a href="/index" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        </div>
        <div>
          <button  form="delete-form"  type="submit" class="text-sm font-semibold leading-6 text-gray-900 cursor-pointer">Delete</a>
        </div>
      </div>
      <!-- <div>
        @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
          <li class="text-red-500 italic">{{ $error }}</li>
          @endforeach
        </ul>
        @endif
      </div> -->

    </form>
    <form id="delete-form" method="post" action="/jobs/{{$job->id}}" class="hidden">
      @csrf
      @method('DELETE')
    </form>
  </body>

</x-layout>