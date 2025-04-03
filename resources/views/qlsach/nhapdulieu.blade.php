<form action="{{url('qlsach/luudulieu')}}" method = "post">
    id: <input type='text' name='id'>   Tên thể loại: <input type='text' name='ten_the_loai'><br>
    <input type='submit' value='Lưu'>
    {{ csrf_field() }}
</form>