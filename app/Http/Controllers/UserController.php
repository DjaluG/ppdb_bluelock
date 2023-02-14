<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\User;
use App\Models\Payment;
use Alert;
use Auth;
use PDF;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        return view('landing.landing');

    }

    public function form()
    {
        // $schools = Http::get('https://akmalweb.my.id/api/daftar_smp.php')->json();
        return view('forms.form');
    }

    public function inputForm(Request $request)
    {
       $validateData = $request->validate([
            'name' => 'required',
            'nisn' => 'required|min:8|max:8',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'email' => 'required|unique:biodatas',
            'phone_me' => 'required|min:12|max:12',
            'phone_dad' => 'required|min:12|max:12',
            'phone_mom' => 'required|min:12|max:12',
        ]);
        $validateData['user_id'] = mt_rand(1,1111);


        Biodata::create($validateData);
        // $dataTerbaru = Data::latest()->first();

        $password = $request->name . $request->nisn;

         User::create([
          'name' => $validateData['name'],
          'email' => $validateData['email'],
          'password' => bcrypt($password),
          'role' => 'user',
         ]);


         $pdf = PDF::loadview('my.pdf',compact('validateData', 'password'), [
            'name' => Biodata::latest()->first(),
            'nisn' => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'email' => $request->asal_sekolah,
            'phone_me' => $request->phone_me,
            'phone_dad' => $request->phone_dad,
            'phone_mom' => $request->phone_mom,

         ])->setPaper('a4', 'landscape');

         return $pdf->download(str_replace(' ', '_', $validateData['name']) . '_' . $validateData['nisn'] . '.pdf');

    }

    public function dashboard()
    {
        $data = Payment::where('user_id', '=', Auth::user()->id)->first();
     return view('dashboard.first',compact('data'));
    }

    public function dashboardFunction()
    {
        $data = Payment::where('user_id', '=', Auth::user()->id)->first();
        $biodatas = Payment::with('user')->paginate(5);
        return view('dashboard.second', compact('biodatas','data'));
    }
}
