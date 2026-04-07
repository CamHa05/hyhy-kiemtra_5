<x-movie-layout>
    <x-slot name="title">
        Movie genre
    </x-slot>
    <div class="list-movie">
        @foreach($movie1 as $row)
        <div class="movie">
            <a href="{{url('/phim/'.$row->id)}}" style="display:block; text-decoration:none; color:inherit; width:100%;">
                <img src="{{asset('storage/'.$row->image)}}" alt="" style="display:block; width: 100%; height: 300px; object-fit: cover;">
                <b>{{$row->movie_name_vn}}</b><br>
                {{$row->release_date}}
            </a>
        </div>
        @endforeach
    </div>
</x-movie-layout>