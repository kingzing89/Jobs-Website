<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>
    <h1>Hi, Welcome to the Home Page, Where you can view multiple jobs</h1>

    @foreach($jobs as $job)
       <li>{{$job['Title']." pays ". $job['Salary'] ."   per year"}}</li>
       @if($isEmployer)
       <div class="flex gap-4">
       <x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button>
       <x-button href="/candidate/show/{{$job->id}}">Candidates</x-button>
       </div>
       @else
       <x-button href="/apply/{{$job->id}}">Apply to this job</x-button>
       @endif
    @endforeach
    
</x-layout>