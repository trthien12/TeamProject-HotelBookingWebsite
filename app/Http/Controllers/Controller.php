<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Bus\DispatchesJobs;
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
<<<<<<< HEAD
    use AuthorizesRequests, ValidatesRequests;
=======
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6
}
