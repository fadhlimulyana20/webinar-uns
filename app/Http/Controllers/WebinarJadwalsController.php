<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\WebinarJadwal as Webinar;
use App\User;

class WebinarJadwalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinars =  Webinar::all(); 
        // $id_user = auth()->user()->id_user;
        // printf($id_user);
        // $user = User::find($id_user);
        // echo($user);
        // $webinars = $user->webinarJadwals;
        return view("pages.webinar.index")->with('webinars', $webinars);
    }

    // controller untuk webinar yang dimiliki oleh user
    // Jadi hanya menampilkan list webinar yang dibuat oleh user terkait
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my(){
        $id_user = auth()->user()->id_user;
        $user = User::find($id_user);
        $webinars = $user->organizeWebinar;

        return view("pages.webinar.user_index")->with('webinars', $webinars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.webinar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'agenda' => 'required',
            'deskripsi' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'tgl_daftar_awal' => 'required',
            'tgl_daftar_akhir' => 'required',
            'path_file_pamflet' => 'image|nullable|max:1999',
        ]);

        // hnadling file template
        if($request->hasFile('path_file_pamflet')){
            // get Filename with extention
            $filenameWithExt = $request->file('path_file_pamflet')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('path_file_pamflet')->extension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('path_file_pamflet')->storeAs('public/file_pamflet', $filenameToStore);
        }else{
            $filenameToStore = 'noimage.jpg';
        }

        // Create Webinar
        $webinar = new Webinar;
        $webinar->agenda = $request->input('agenda');
        $webinar->tanggal_awal = $request->input('tanggal_awal');
        $webinar->tanggal_akhir = $request->input('tanggal_akhir');
        $webinar->tgl_daftar_awal = $request->input('tgl_daftar_awal');
        $webinar->tgl_daftar_akhir = $request->input('tgl_daftar_akhir');
        $webinar->deskripsi = $request->input('deskripsi');
        $webinar->path_file_pamflet = $filenameToStore;
        $webinar->id_user_penyelenggara = auth()->user()->id_user;
        $webinar->save();

        return redirect('/webinar/mywebinar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $webinar = Webinar::find($id);
        return view("pages.webinar.detail")->with('webinar', $webinar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webinar = Webinar::find($id);
        return view("pages.webinar.edit")->with('webinar', $webinar);
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
        $this->validate($request, [
            'agenda' => 'required',
            'deskripsi' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'tgl_daftar_awal' => 'required',
            'tgl_daftar_akhir' => 'required',
            'path_file_pamflet' => 'image|nullable|max:1999',
        ]);

        // hnadling file template
        if($request->hasFile('path_file_pamflet')){
            // get Filename with extention
            $filenameWithExt = $request->file('path_file_pamflet')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('path_file_pamflet')->extension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('path_file_pamflet')->storeAs('public/file_pamflet', $filenameToStore);
        }

        // Create Webinar
        $webinar = Webinar::find($id);
        $webinar->agenda = $request->input('agenda');
        $webinar->tanggal_awal = $request->input('tanggal_awal');
        $webinar->tanggal_akhir = $request->input('tanggal_akhir');
        $webinar->tgl_daftar_awal = $request->input('tgl_daftar_awal');
        $webinar->tgl_daftar_akhir = $request->input('tgl_daftar_akhir');
        $webinar->deskripsi = $request->input('deskripsi');
        // If User Upload image again then update image filename
        if($request->hasFile('path_file_pamflet')){
            $webinar->path_file_pamflet = $filenameToStore;
        }
        $webinar->save();

        return redirect('/webinar/mywebinar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webinar = Webinar::find($id);

        if($webinar->path_file_pamflet != 'noimage.jpg'){
            // Delete image
            printf($webinar->path_file_pamflet);
            Storage::delete('public/file_pamflet/'.$webinar->path_file_pamflet);
        }

        $webinar->delete();

        return redirect('/webinar/mywebinar');
    }
}
