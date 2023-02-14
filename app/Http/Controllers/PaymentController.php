<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Biodata;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pembayaran(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'bukti' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'nominal' => 'required',
            'pemilik' => 'required',
            'nama_bank_lain' => 'nullable',
        ]);


        $image = $request->file('bukti');
        $imageName = time().rand().'.'.$image->extension();
        if(!file_exists(public_path('/assets'.$image->getClientOriginalName()))){
            $destinationPath = public_path('/assets/img');
            $image->move($destinationPath. $imageName);
            $uploaded = $imageName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }


        Payment::create([
            'nama_bank' => $request->nama_bank,
            'pemilik' => $request->pemilik,
            'nominal' => $request->nominal,
            'nama_bank_lain' => $request->nama_bank_lain,
            'bukti' => $uploaded,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/dashboard')->with('success', 'Successfully Pay, Please Wait For Next Info');
    } 



    
    
    public function terima($id)
    {
   Payment::where('id', $id)->update([
            'status' => 1,
        ]);
        return redirect()->route('dashboardFunction');
    }

    public function tolak($id)
    {
   Payment::where('id', $id)->update([
            'status' => 2,
        ]);
        return redirect()->route('dashboardFunction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $biodata = Biodata::where('id', $id)->first();

        return view('dashboard.detail', compact('biodata'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function bukti($id)
    {
        $bukti = Payment::where('id', $id)->first();
        return view('dashboard.bukti', compact('bukti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bank' => 'required',
            'bukti' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'nominal' => 'required',
            'pemilik' => 'required',
            'nama_bank_lain' => 'nullable',
        ]);


        $image = $request->file('bukti');
        $imageName = time().rand().'.'.$image->extension();
        if(!file_exists(public_path('/assets'.$image->getClientOriginalName()))){
            $destinationPath = public_path('/assets/img');
            $image->move($destinationPath. $imageName);
            $uploaded = $imageName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }


        Payment::where('id', $id)->update([
            'nama_bank' => $request->nama_bank,
            'pemilik' => $request->pemilik,
            'nominal' => $request->nominal,
            'nama_bank_lain' => $request->nama_bank_lain,
            'bukti' => $uploaded,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/dashboard')->with('success', 'Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
