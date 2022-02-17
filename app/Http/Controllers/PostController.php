<?php

/*PHP7から導入された型検査モードの指定構文 */
/* 関数呼び出しの際、宣言されたのと正確に一致する型でなければエラーを返す */
/*下記を宣言しない場合は、可能であれば型変換をし、できない場合はエラーを返す形になる */
/*このファイル一つ分を対象としている */
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\posted;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class PostController extends Controller
{
    /**
     * @return View
     */
    public function index() : View/* : view の部分は消しても動く 返し値をわかりやすく見れるようにするためのものかと */
    {
        //テーブルデータの全てを取得
        $posts = Post::all();
        //channel/index.blade.phpへpostにある全データをもって表示へ
        //インデックスを表示する段階でテーブルの全メッセージを表示させるための処理
        return view('channels.index',["posts" => $posts]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        //テーブルデータ保存
        $post = new Post($request->all());
        $post->save();
        //イベント新規
        event(new posted($post));
        return response()->json(['message' => '投稿しました。']);
    }
}
