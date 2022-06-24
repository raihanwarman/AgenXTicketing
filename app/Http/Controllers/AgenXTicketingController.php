<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Admin;
use Session;
use DB;

class AgenXTicketingController extends Controller
{
    //
    public function HomeAgenX() {
        return view("HomeAgenX");
    }
    public function PublicRegistrationAgenX() {
        return view("PublicRegistrationAgenX");
    }
    public function AdminLoginAgenX() {
        return view("AdminLoginAgenX");
    }
    public function CreateAdmin() {
        return view("CreateAdmin");
    }

    public function InputTiket(Request $request){
        $request->validate([
            'nama'=>'required',
            'nohp'=>'required',
            'nik'=>'required|unique:tikets'
            ]);
        $tiket = new Tiket();
        $tiket->Nama = $request->nama;
        $tiket->NoHp = $request->nohp;
        $tiket->NIK = $request->nik;
        $tiket->Status = false;
        $res = $tiket->save();
        if($res){
            return back()->with('berhasil', 'mendaftar tiket');
        }else {
            return back()->with('gagal', 'coba lagi');
        }
    }

    public function CreateAdminReg(Request $request){
        $request->validate([
            'nama'=>'required',
            'password'=>'required'
            ]);
        $admin = new Admin();
        $admin->Nama = $request->nama;
        $admin->Password = $request->password;
        $res = $admin->save();
        if($res){
            return back()->with('berhasil', 'mendaftar tiket');
        }else {
            return back()->with('gagal', 'coba lagi');
        }
    }

    
    public function AdminLoginAgenXAuth(request $request) {
        $request->validate([
            'id'=>'required',
            'password'=>'required'
            ]);
        $auth = Admin::where('id', '=', $request->id)->first();
        if($auth){
            if($auth->Password == $request->password){
                $request->session()->put('loginid',$auth->id);
                return redirect('dbAgenX');
            }else {
                return back()->with('gagal', 'Password Salah');
            }
        } else {
            return back()->with('gagal', 'ID salah');
        }

    }

    public function DBAgenX() {
        $data = array();
        if (session::has('loginid')) {
            $data = Admin::where('id', '=', Session::get('loginid'))->first();
        }
        $dbAll = DB::select('select * from tikets');
        return view('dbAgenX', compact("dbAll"));
    }

    public function AdminCheckinSearch(){
        return view ("AdminChekinSearch");
    }

    public function SearchChekin(request $request){
        $request->validate([
            'nik'=>'required'
            ]);
        /*$auth = Tiket::where('NIK', '=', $request->nik)->first();*/
        $auth = DB::select('select * from tikets where NIK='.$request->nik);
        if($auth != NULL){
            return view('ConfirmCheckIn', compact("auth"));
        } else {
            return back()->with('gagal','NIK Tidak Ditemukan' . $request->nik);
        }
    }

    public function ConfirmCheckin($input) {
        DB::update('update tikets set Status = ? where NIK = $input' ,[true]);
    }

    public function SudahChekIn(){
        $dbAll = DB::select('select * from tikets where Status=true');
        return view('SudahCheckInView', compact("dbAll"));
    }

    public function BelumChekIn(){
        $dbAll = DB::select('select * from tikets where Status=false');
        return view('BelumCheckInView', compact("dbAll"));
    }
}
