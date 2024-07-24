<x-layout>
    <x-slot:heading>
        Candidates List
    </x-slot:heading>

    @foreach($apps as $app)
        <x-candidate>
            <x-slot:positon>{{$app->belongsTojob->Title}}</x-slot:positon>
            <x-slot:email>{{$app->email}}</x-slot:email>
            <x-slot:salary>{{$app->belongsTojob->Salary}}</x-slot:salary>
            <x-slot:cv>{{$app->cv}}</x-slot:cv>

            <x-slot:download>
                <form method="get" action="{{ route('download', ['file_path' => $app->cv]) }}">
                    <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">Download</button>
                </form>
            </x-slot:download>
        </x-candidate>
    @endforeach

    {{ $apps->links() }}
</x-layout>
