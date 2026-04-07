<!-- CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<x-movie-layout>
    <x-slot name="title">
        Movie List
    </x-slot>
    <x-slot>
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div style='text-align:center; color:#15c; font-weight:bold; font-size:20px;'>DANH SÁCH PHIM</div>
        <a href="{{route('moviecreate')}}" class='btn btn-sm btn-success mb-1'>Thêm</a>
        <table id="movie-table" class="table table-striped table-bordered" width="100%">
            <thead>
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm đánh giá</th>
                    <th width=80px></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td><img src="{{$row->image_link??asset('storage/'.$row->image)}}" width="50px"></td>
                    <td>{{$row->movie_name_vn}}</td>
                    <td>{{$row->tagline_vn != '' ? explode('.',$row->tagline_vn)[0].'.':""}}</td>
                    <td>{{$row->release_date}}</td>
                    <td>{{$row->vote_average}}</td>
                    <td>
                        <div class="btn-group">
                            <form method='post' action="{{route('moviedelete')}}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa cuốn sách này không?');">
                                <a href='{{url("phim/$row->id")}}'' class=' btn btn-sm btn-primary'>Xem</a>
                                <input type='hidden' value='{{$row->id}}' name='id'>
                                <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                                {{ csrf_field() }}
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-movie-layout>
<script>
    $(document).ready(function() {
        new DataTable('#movie-table', {
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
            bStateSave: true,
        })
    })
</script>