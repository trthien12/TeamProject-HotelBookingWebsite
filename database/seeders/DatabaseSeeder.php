<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slideshow;
use App\Models\Admin; // Import model Admin

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kiểm tra xem admin đã tồn tại chưa, chỉ tạo admin nếu nó chưa tồn tại trong bảng admins
        if (Admin::where('email', 'ng.thanhnguyen162@gmail.com')->doesntExist()) {
            Admin::create([
                'name' => 'Admin',
                'email' => 'ng.thanhnguyen162@gmail.com',
                'password' => bcrypt('20012004'), // Mật khẩu đã mã hóa
            ]);
        }
        // \App\Models\User::factory(10)->create();
        Slideshow::insert([
            [
                'S_img' => 'img/goden_banner.jpg',
                'caption1' => 'Spend Your Holiday',
                'caption2' => 'Explore new experience with Golden Tree Hotel',
            ],
            
            [
                'S_img' => 'https://images.trvl-media.com/lodging/1000000/10000/9100/9100/e6ebefae.jpg?impolicy=resizecrop&amp;rw=1200&amp;ra=fit',
                'caption1' => 'Unwind with Us',
                'caption2' => 'Explore new experience with Golden Tree Hotel',
            ],
            [
                'S_img' => 'img/banner_bed.jpg',
                'caption1' => 'Feel at Home',
                'caption2' => 'Explore new experience with Golden Tree Hotel',
            ],
        ]);
    }
}
