<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Orders;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        $users=User::orderBy('id','desc')->limit(10)->get();
        $orders=Orders::orderBy('id','desc')->with('user')->get();
        return view('layout.dashboard', compact('users','orders'));

    }

     public function userlist()
    {
        $users=User::orderBy('id','desc')->get();
        return view('admin.user_list', compact('users'));
    }
    public function userdelete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }

    public function feedbacklist()
    {
        $feedbacks=Feedback::orderBy('id','desc')->get();
        return view('admin.feedback_list', compact('feedbacks'));
    }
    // orderlist
    public function orderlist()
    {
        $orders=Orders::orderBy('id','desc')->with('user')->get();
        return view('admin.orders_list', compact('orders'));
    }
    public function orderdelete($id)
    {
        $order=Orders::find($id);
        $order->delete();
        return redirect()->back()->with('success','Order Deleted Successfully');
    }
    public function orderstatus_cancel($id)
    {
        $order=Orders::find($id);
        $order->status=0;
        $order->save();
        return redirect()->back()->with('success','Order Status Updated Successfully');
    }
    public function orderstatus_deliver($id)
    {
        $order=Orders::find($id);
        $order->status=2;
        $order->save();
        return redirect()->back()->with('success','Order Status Updated Successfully');
    }

public function form_cancel()
{
    // return back to previous page;
    return redirect('/admin/dashboard');


}


}
