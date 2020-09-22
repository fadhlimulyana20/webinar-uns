<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebinarJadwal as Webinar;

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
        return view("pages.webinar.index")->with('webinars', $webinars);
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
        ]);

        // Create Webinar
        $webinar = new Webinar;
        $webinar->agenda = $request->input('agenda');
        $webinar->tanggal_awal = $request->input('tanggal_awal');
        $webinar->tanggal_akhir = $request->input('tanggal_akhir');
        $webinar->tgl_daftar_awal = $request->input('tgl_daftar_awal');
        $webinar->tgl_daftar_akhir = $request->input('tgl_daftar_akhir');
        $webinar->deskripsi = $request->input('deskripsi');
        $webinar->save();

        return redirect('/webinar');
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
        ]);

        // Create Webinar
        $webinar = Webinar::find($id);
        $webinar->agenda = $request->input('agenda');
        $webinar->tanggal_awal = $request->input('tanggal_awal');
        $webinar->tanggal_akhir = $request->input('tanggal_akhir');
        $webinar->tgl_daftar_awal = $request->input('tgl_daftar_awal');
        $webinar->tgl_daftar_akhir = $request->input('tgl_daftar_akhir');
        $webinar->deskripsi = $request->input('deskripsi');
        $webinar->save();

        return redirect('/webinar/'.$id);
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
        $webinar->delete();

        return redirect('/webinar');
    }
}
