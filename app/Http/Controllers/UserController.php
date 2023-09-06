<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Charts\ChartUsers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Hash;
use PDF;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('users.index');
    }

    public function saveUser(Request $req){
        $password = $req->password;
        $hashed = Hash::make($password);

        $record = New User();
        $record->name = $req->name;
        $record->email = $req->email;
        $record->password = $hashed;
        $record->save();

        $req->session()->flash('flash_message_success', ' User Account Saved.');
        return redirect()->back();
    }

    public function editUser($id){
        $record = User::find($id);
        $name = $record->name;
        $email = $record->email;
    
        return view('users.edit',['id'=>$id, 'name'=>$name, 'email'=>$email]);
    }

    public function editUserSave($id, Request $req){
        $record = User::find($id);
        $record->name = $req->name;
        $record->email = $req->email;
        $record->save();

        $req->session()->flash('flash_message_success', ' User Edited.');
        return redirect('users');
    }

    public function resetPassword($id){
        $record = User::find($id);
        $name = $record->name;
        $email = $record->email;

        return view('users.reset',['id'=>$id, 'name'=>$name, 'email'=>$email]);
    }

    public function resetPasswordSave($id, Request $req){
        $currentUserPassword = auth()->user()->password;
        $acPassword = $req->adminConfirmPassword;

        if(!password_verify($acPassword,$currentUserPassword)){
            echo "hello";
            $req->session()->flash('flash_message_warning', ' Error. User password mismatch.');
        }
        else{
            $hashed = Hash::make($req->newPassword);

            $record = User::find($id);
            $record->password = $hashed;
            $record->save();

            $req->session()->flash('flash_message_success', ' User password reset successful.');
           
        }
        return redirect('users');
    }

    public function chart(){
        $chart = new ChartUsers;
        $chart->minimalist(true);  //true if pie and doughnut, false if bar line etc
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'pie', [10, 20, 30, 40])->backgroundColor(['red','blue','green','orange']);
        
        // $chart->dataset('My dataset 2', 'pie', [4, 3, 2, 1])->color('blue');
        // $chart->dataset('My dataset 3', 'line', [3, 4, 1, 2])->color('green');
        $chart->title('Test', $font_size = 20, $color = '#3D4852', $bold = true, $font_family = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        // $chart->displayLegend(true);

        // return $chart->api();
        return view('chart',compact('chart'));
    }

    public function report(){
        $word = "Hello World";

        $data = ['word'=>$word];

        $pdf = PDF::loadView('report', $data)
                ->setOptions(['defaultFont' => 'sans-serif'])
                ->setPaper('A4','portrait');
        $pdf->render();
        
        return $pdf->stream('report.pdf');
    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
