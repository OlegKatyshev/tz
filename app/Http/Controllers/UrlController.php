<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UrlStoreService;

class UrlController extends Controller
{
    public function index(UrlStoreService $urlStoreService){

         return view('url.index', ['urls' => $urlStoreService->getLastItems()]);
    }

    public function save(UrlStoreService $urlStoreService, Request $request){

        $request->validate([
            'url'=>'url'
        ],[
            'url'=>'Введен не корректный url, пример: http://.. or https://..'
        ]);
        $urlStoreService->setData($request->get('url'));

        $html = view('url.url_list', ['urls' => $urlStoreService->getLastItems()])->render();
        return response()->json(['success' => true, 'html'=>$html]);
    }

    public function reset(UrlStoreService $urlStoreService){
        $urlStoreService->resetData();
        return back();
    }
}
