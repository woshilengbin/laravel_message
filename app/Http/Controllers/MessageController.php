<?php
/**
 * Created by PhpStorm.
 * User: lengbin
 * Date: 2016/10/31
 * Time: 10:14
 */
namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 留言板首页
     */
    public function index(){
        $message = Message::join('admin','admin.id','=','message.user_id')->where('message.status','1')->orderBy('message.created_at', 'desc')->paginate(10,['admin.username','message.*']);
        return view('Message.index',[
            'messages'=>$message
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 发布留言信息
     */
    public function addMessage(Request $request){
        if(session('user')){
            $this->validate($request,[
                'message.message'=> 'required'
            ],[
                'required' =>':attribute为必填项'
            ],[
                'Message.message'=>'留言信息'
            ]);
            $data =  $request->input('message');
            $message = new Message();
            $message->message = trim($data['message']);
            $message->user_id = $data['user_id'];
            if ($message->save()){
                return redirect('Message/index')->with('success','添加成功！');
            }else{
                return redirect()->back()->with('error','添加失败！');
            }
        }else{
            return redirect('Login/login')->with('success','请进行登陆！');
        }
    }
}