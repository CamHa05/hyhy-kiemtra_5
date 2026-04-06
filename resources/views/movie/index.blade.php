<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>
    <div class="list-movie">
    @foreach($movie as $row)
        <div class="movie">
            <img src="{{asset('storage/'.$row->image)}}" alt="" style="width: 100%; height: 300px; object-fit: cover;">
            <b>{{$row->movie_name_vn}}</b><br>
            {{$row->release_date}}
        </div>    
    @endforeach
    </div>
</x-movie-layout>