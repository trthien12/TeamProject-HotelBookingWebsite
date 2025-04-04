<section class="book">
    <div class="container flex_space">
        <div class="text">
            <h1><span>Book</span> Your Rooms</h1>
        </div>
        <div class="form">
                <form action="{{ route('home.search') }}" class="grid" method="POST">
                    @csrf
                    <table class="table-book">
                        <tr>
                            <td>Ngày nhận phòng</td>
                            <td>Ngày trả phòng</td>
                            <td>Người lớn</td>
                            <td>Trẻ em</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="check_in" id="checkin" required></td>
                            <td><input type="date" name="check_out" id="checkout" required></td>
                            <td><input type="number" name="adults" min="1" placeholder="Người lớn" max="10" value="1" required></td>
                            <td><input type="number" name="children" min="0" placeholder="Trẻ em"  max="10" value="0"  required></td>
                            <td><button type="submit" class="primary-btn">Tìm kiếm</button></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>
</section>
