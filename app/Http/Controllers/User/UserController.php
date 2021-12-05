<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\DepositUsdt;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * User Profile Setting Method
     */

    public function profileSetting()
    {
        $admin = Auth::user();
        return view('user.admin.edit',['admin'=>$admin]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'sponser_id' => 'required|max:255',
            'user_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$user->id,
        ]);
       $user->sponser_id = $request->input('sponser_id');
       $user->first_name = $request->input('first_name');
       $user->last_name = $request->input('last_name');
       $user->user_name = $request->input('user_name');
       $user->email = $request->input('email');
       $user->phone_number = $request->input('phone_number');
       $input = $request->all();
       $user->password = isset($input['password']) ? bcrypt($request->input('password')):$user->password;
       $user->save();
       Session::flash('success_message','Profile updated successfully.');
       return redirect()->back();
    }

    public function configCache(){
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return redirect()->back();
    }

    public function depositFund(){
        $user = Auth::user();
        $deposit = Deposit::where('user_id',$user->id)->first();
        return view('user.admin.deposit_fund',['deposit'=>$deposit]);
    }

    public function updateDepositFund(Request $request)
    {
        $user = Auth::user();
        $deposit = Deposit::find($user->id);
        if(!$deposit){
            $deposit= new Deposit();
        }
        $this->validate($request, [
            'amount' => 'required|max:255',
            'remarks' => 'required|max:255',
            'pin' => 'required|max:255',
        ]);
        if ($request->hasFile('slip')) {
            if ($request->file('slip')->isValid()) {
                $this->validate($request, [
                    'slip' => 'required'
                ]);
                $deposit = $request->file('slip');
                $destinationPath = "uploads/";
                $extension = $deposit->getClientOriginalExtension();
                $fileName = $deposit->getClientOriginalName();
                $fileName = rand() . $fileName;
                $delete_old_file = "uploads/".$deposit->slip;
                File::delete($delete_old_file);
                //renaming image
                $request->file('slip')->move($destinationPath, $fileName);
                $deposit->slip = $fileName;
            }
        }
        $deposit->amount = $request->input('amount');
        $deposit->remarks = $request->input('remarks');
        $deposit->pin = $request->input('pin');
        $deposit->user_id = $user->id;
        $deposit->save();
        Session::flash('success_message','Deposit Fund updated successfully.');
        return redirect()->back();
    }

    public function depositUsdt(){
        $user = Auth::user();
        $deposit = DepositUsdt::where('user_id',$user->id)->first();
        return view('user.admin.deposit_usdt',['deposit'=>$deposit]);
    }

    public function updateDepositUsdt(Request $request)
    {
        $user = Auth::user();
        $deposit = DepositUsdt::find($user->id);
        if(!$deposit){
            $deposit= new DepositUsdt();
        }
        $this->validate($request, [
            'network' => 'required|max:255',
            'wallet_address' => 'required|max:255',
            'selected_wallet' => 'required|max:255',
        ]);
        $deposit->network = $request->input('network');
        $deposit->wallet_address = $request->input('wallet_address');
        $deposit->selected_wallet = $request->input('selected_wallet');
        $deposit->user_id = $user->id;
        $deposit->save();
        Session::flash('success_message','Deposit Fund updated successfully.');
        return redirect()->back();
    }

    public function notifications()
    {
//        dd(auth()->user()->notifications());
//        dd(auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count());
        return auth()->user()->unreadNotifications()->limit(10)->get()->toArray();
    }
    public function showMessage(){


    }

}
