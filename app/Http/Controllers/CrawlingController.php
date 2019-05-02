<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class CrawlingController extends Controller
{

    public function index(){
			return view('crawler');
    }

    public function crawler(Request $request){
    	$url =  $request->post('url');
    	Storage::put('url.txt', $url);
    	//sleep(2);
    	$test = Storage::get('url.txt');
    	shell_exec('cd .. && php artisan dusk');
    	//sleep(2);
    	$data = Storage::get('data.txt');
    	echo($data);

        Storage::put('url.txt', '');
        Storage::put('data.txt', '');
    }
}
