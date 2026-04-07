<x-movie-layout>
    <x-slot name="title">
        Movie infor
    </x-slot>
    @foreach($movie2 as $row)
    <p style="text-transform: uppercase; font-size:24px">{{$row->movie_name_vn}}</p>
    <div class="movie-info">
        <div>
            <img src="{{asset('storage/'.$row->image)}}" alt="" style="width: 100%; height: 300px; object-fit: cover;">
        </div>
        <div>
            Ngày phát hành: <b>{{$row->release_date}}</b><br>
            Quốc gia: <b>{{$row->country_name}}</b><br>
            Thời gian: <b>{{$row->runtime}}</b><br>
            Doanh thu: <b>{{$row->revenue}}</b><br>
            <b>Mô tả:</b> <br> {{$row->overview_vn}}<br>
            <button style="background-color:aqua; border:none; padding:5px 10px; cursor:pointer;">Xem trailer</button>
        </div>
        @endforeach
    </div>
</x-movie-layout>