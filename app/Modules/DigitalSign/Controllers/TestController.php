<?php
namespace App\Modules\DigitalSign\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\DigitalSign\Helpers\Test as Help;
use App\Modules\DigitalSign\Libs\Test as Lib;
use App\Modules\DigitalSign\Models\Test;
use App\Modules\DigitalSign\Services\Test as ServicesTest;

class TestController extends Controller
{

    public function index()
    {
        $data = [];
        $data['config'] = config('DigitalSign.test.test');
        $data['help'] = (new Help)->test();
        $data['lib'] = (new Lib)->test();
        $data['locale'] = trans('DigitalSign::test.test');
        $data['model'] = Test::all();
        $data['services'] = (new ServicesTest)->test();
        return view("DigitalSign::index", $data);
    }
}
