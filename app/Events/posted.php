<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


use App\Models\Post;


/*イベント新規 shoulbroadcastという抽象クラスを使って broadcastを成立させている */
/*クラスを生成して*/
/*このクラス名はapp.jsのlisten('posted' で使用されている　*/
class posted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;
    //テスト用
    public $data;
    public $name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        //コンストラクタ
        //event(new --) で作成された際時点で読み出される
        //自身が持つ変数$postにその段階でつくられたテーブルのデータを入れる
        $this->post=$post;
        //テスト用
        $this->data=10;
        $this->name='post';

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
        //$this->name　はチャンネル名 このclassそのものが送られている様子
        /*pusherに送られるデータ json
        {
            //テーブルデータ
            "post": {
              "id": 88,
              "text": "もきゅー！",
              "created_at": "2022-02-17 07:21:11",
              "updated_at": "2022-02-17 07:21:11"
            },
            //class postedの個別変数
            "data": 10,
            "name": "post"
          }
        */
        //プライベートチャンネルでは return new PrivateChannel('post'); という感じになる
        return new Channel($this->name);
    }
/*     //値を返す オーバーライドした時点で上書きするので全てコメントアウト
    public function broadcastWith(){
        return [
            'data'=>$this->data,
        ];
    } */
/*     //ブロードキャスト条件
    public function broadcastWhen(){
        return $this->data >= 10;
    } */
}
