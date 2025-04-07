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
                'password' => bcrypt('20012004'), // Mật khẩu hiện trong db là đã mã hóa
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
                'S_img' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/354661255.jpg?k=c3e75d3bc28b232bc41f4295e28f39d214794b2621babeae2e465c11bcea71af&o=&hp=1',
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
