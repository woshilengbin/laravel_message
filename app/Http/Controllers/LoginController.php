<?php
/**
 * Created by PhpStorm.
 * User: lengbin
 * Date: 2016/10/31
 * Time: 10:14
 */
namespace App\Http\Controllers;

use App\Admin;
use App\Message;
use Illuminate\Http\Request;

class LoginController extends Controller{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登陆页面
     */
    public function login(){
        return view('Login.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 登陆完成动作
     */
    public function doLogin(Request $request){
        $data =  $request->input();
        $user = Admin::where([
            'username'=>$data['username'],
            'password'=>md5($data['password'])
        ])->first();
        if ($user){
            if($user['status'] == 1){
                $request->session()->put('user',$user);
                return redirect('Message/index')->with('success','登陆成功！');
            }else{
                return redirect()->back()->with('error','登陆失败，你的账号已被禁用，请联系管理员！');
            }
        }else{
            return redirect()->back()->with('error','登陆失败，账号或密码错误！');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 注册页面
     */
    public function registered(){
        return view('Login.registered');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 注册完成动作
     */
    public function doRegistered(Request $request){
        $this->validate($request,[
            'password'=> 'required|min:6|max:12'
        ],[
            'required' =>':attribute为必填项',
            'min' =>':attribute最少位数为六位',
            'max' =>':attribute最多位数为十二位'
        ],[
            'password'=>'密码'
        ]);
        $data = $request->input();
        if($data['password'] == $data['repassword']){
            $username = Admin::where('username',$data['username'])->first();
            if(!$username){
                $user = Admin::create([
                    'username'=>$data['username'],
                    'password'=>md5($data['password'])
                ]);
                if($user){
                    return redirect('Login/login')->with('success','注册成功，请进行登陆！');
                }
            }else{
                return redirect('Login/registered')->with('error','该用户名已被使用，请重新输入！');
            }
        }else{
            return redirect('Login/registered')->with('error','两次输入的密码不一致！');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人中心页面
     */
    public function userInfo(){
        $userSession = session('user');
        $userMessage = Message::where(['user_id'=>$userSession->id])->orderBy('created_at', 'desc')->paginate(10);
        return view('Login.userInfo',[
            'userMessage'=>$userMessage
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 用户管理页面
     */
    public function userManagement(){
        $userSession = session('user');
        $userInfoes = Admin::where('id','<>',$userSession->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('Login.userManagement',[
            'userInfoes'=>$userInfoes
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 留言管理页面
     */
    public function messageManagement(){
        $messageList = Message::join('admin','admin.id','=','message.user_id')->orderBy('created_at','desc')->paginate(10,['admin.username','message.*']);
        return view('Login.messageManagement',[
            'messageList'=>$messageList
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 修改用户状态
     */
    public function isSureStatus($id){
        $user = Admin::find($id);
        if($user['status'] == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        if($user->save()){
            return redirect('Login/userManagement')->with('success','状态修改成功！');
        }else{
            return redirect('Login/userManagement')->with('error','状态修改失败！');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 修改留言状态
     */
    public function messageStatus($id){
        $message = Message::find($id);
        if($message['status'] == 1){
            $message->status = 0;
        }else{
            $message->status = 1;
        }
        if($message->save()){
            return redirect('Login/messageManagement')->with('success','状态修改成功！');
        }else{
            return redirect('Login/messageManagement')->with('error','状态修改失败！');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 删除留言
     */
    public function deleteMessage($id){
        $message = Message::find($id);
        if($message->delete()){
            return redirect('Login/messageManagement')->with('success','留言删除成功！');
        }else{
            return redirect('Login/messageManagement')->with('error','留言删除失败！');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 用户退出
     */
    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('Message/index')->with('success','退出成功！');
    }
}