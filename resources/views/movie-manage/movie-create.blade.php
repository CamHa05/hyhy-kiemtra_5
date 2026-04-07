<x-movie-layout>
    <x-slot name='title'>Movie Create</x-slot>
    <h1 style='color:green'>THÊM PHIM</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('moviesave')}}" method="post" enctype="multipart/form-data">
        @csrf <label>Tên tiếng Anh</label>
        <input type='text' class='form-control form-control-sm' name='movie_name'>

        <label>Tên tiếng Việt</label>
        <input type='text' class='form-control form-control-sm' name='movie_name_vn'>

        <label>Ngày phát hành</label>
        <input type='text' class='form-control form-control-sm' name='release_date'>

        <label>Mô tả</label>
        <input type='text' class='form-control form-control-sm' name='tagline_vn'>

        <label>Ảnh đại diện</label>
        <input type='file' name='image' accept="image/*" class='form-control-file'>

        <label>Link ảnh đại diện</label>
        <input type='text' name='image_link' class='form-control'>

        <button type="submit" class='btn btn-success mt-2'>Lưu</button>
    </form>
</x-movie-layout>