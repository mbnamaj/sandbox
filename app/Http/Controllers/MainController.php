<?php

namespace App\Http\Controllers;

use App\SandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MainController extends Controller {
    public function sand(){
        //Перед отображением запишем данные из таблицы
        $strings = DB::table('sand_models')
            ->select('url', 'filesize', 'time')
            ->limit(10)
            ->get();
        $result = '<li>Ссылка на скачивание файла</li><li>Размер файла (в байтах)</li><li>Дата/время загрузки</li>';
        if (!$strings->isEmpty()){
            foreach ($strings as $string){
                $result = $result."<ul>";
                $tmp = '7';
                foreach ($string as $id => $value) {
                    if ($tmp=='7') {
                        $result = $result."<li><p><a href=$value download>$value</p></li>";
                    } else {
                        $result = $result.'<li><p><a>'.$value.'</a></p></li>';
                    }
                    $tmp = '4'; 
                }
                $result = $result."</ul>";
            }
        } else {
            $result = $result."<ul><li></li><li>Данные не найдены</li><li></li></ul>";
        }
        return view('sandbox', [ 'dataset' => $result]);
    }
    public function sandmodel(Request $request){
        $valid = $request->validate([
            'Form_fileLoader' => 'required|file'
        ]);

        //Сохраняем считываем параметры файла и сохраняем файл на диск
        $form = new SandModel();
        $file = $request->file('Form_fileLoader');
        $filesize = $file->getSize();
        $url = '/files/'.$file->getClientOriginalName();
        $filename = $file->getClientOriginalName();
        $timestamp = File::lastModified($file);
        $file->move(public_path() . '/files/', $file->getClientOriginalName());

        //Записываем данные в базу
        $form->filesize = $filesize;
        $form->url = $url;
        $form->time = Carbon::createFromTimestamp($timestamp);
        $form->save();
        return redirect()->route('/');
    }
    public function AuthRouteAPI(Request $request) {
        return $request->user();
    }
}
