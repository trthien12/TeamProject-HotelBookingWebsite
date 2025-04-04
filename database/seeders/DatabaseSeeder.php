<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use App\Models\Slideshow;
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
        /// Kiểm tra xem admin đã tồn tại chưa, chỉ tạo admin nếu nó chưa tồn tại trong bảng admins
        if (Admin::where('email', 'ng.thanhnguyen162@gmail.com')->doesntExist()) {
            Admin::create([
                'name' => 'Admin',
                'email' => 'ng.thanhnguyen162@gmail.com',
                'password' => bcrypt('20012004'), // Mật khẩu đã mã hóa
            ]);
        }
    }
}
