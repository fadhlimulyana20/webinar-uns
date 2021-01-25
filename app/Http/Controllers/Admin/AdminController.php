<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\WebinarJadwal as Webinar;
use App\Pembicara;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
      return view('admin.layout');
    }

    // controller untuk webinar yang dimiliki oleh user
    // Jadi hanya menampilkan list webinar yang dibuat oleh user terkait
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function webinar(){
      $id_user = auth()->user()->id_user;
      $user = User::find($id_user);
      $webinars = $user->organizeWebinar;

      return view("admin.webinar.index")->with('webinars', $webinars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editWebinar($id)
    {
        $webinar = Webinar::find($id);
        return view("admin.webinar.edit")->with('webinar', $webinar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWebinar(Request $request, $id)
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

        return redirect('/admin/webinar');
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWebinar()
    {
        return view('admin.webinar.create');
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWebinar(Request $request)
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

        return redirect('/admin/webinar/');
	}
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyWebinar($id)
    {
        $webinar = Webinar::find($id);

        if($webinar->path_file_pamflet != 'noimage.jpg'){
            // Delete image
            printf($webinar->path_file_pamflet);
            Storage::delete('public/file_pamflet/'.$webinar->path_file_pamflet);
        }

        $webinar->delete();

        return redirect('admin/webinar');
    }


    // menampilkan seluruh pembicara
    public function Pembicara(){
        $pembicara = Pembicara::all();

        return view('admin.pembicara.index')->with('pembicara', $pembicara);
    }

    public function CreatePembicara(){
        $webinar = Webinar::pluck('agenda', 'id');

        return view('admin.pembicara.create')->with('webinar', $webinar);
    }

    public function StorePembicara(Request $request){
        $this->validate($request, [
            'nama_pembicara' => 'required',
            'topik' => 'required',
            'tanggal_presentasi' => 'required',
            'jam' => 'required',
            'webinar' => 'required',
            'file_materi' => 'required'
        ]);

        $pembicara = new Pembicara;
        $pembicara->nama_pembicara = $request->input('nama_pembicara');
        $pembicara->topik = $request->input('topik');
        $pembicara->tanggal_presentasi = $request->input('tanggal_presentasi');
        $pembicara->jam = $request->input('jam');
        $pembicara->webinar_id = $request->input('webinar');
        
        if($request->hasFile('file_materi')){
            $file = $request->file('file_materi');
            $upload_path = 'public/file_materi';
            $file_name = time().'_'.$file->getClientOriginalName();

            $file->storeAs($upload_path, $file_name);

            $pembicara->file_materi = '/storage/file_materi/'.$file_name;
            $pembicara->nama_file_materi = $file->getClientOriginalName();
        }

        $pembicara->save();

        return redirect(route('admin.pembicara'));
    }

    public function DestroyPembicara($id){
        $pembicara = Pembicara::find($id);

        if($pembicara->file_materi != ''){
            $path = $pembicara->file_materi;
            $path_to_delete = str_replace('/storage/', '/public/', $path);
            Storage::delete($path_to_delete);
        }

        $pembicara->delete();

        return redirect('/admin/pembicara');
    }

    public function PembicaraDetail($id){
        $pembicara = Pembicara::find($id);

        return $pembicara;
    }

    public function EditPembicara($id){
        $pembicara = Pembicara::find($id);
        $webinar = Webinar::pluck('agenda', 'id');

        return view('admin.pembicara.edit', [
            'pembicara' => $pembicara,
            'webinar' => $webinar
        ]);
    }

    public function UpdatePembicara(Request $request, $id){
        $pembicara = Pembicara::find($id);

        $this->validate($request, [
            'nama_pembicara' => 'required',
            'topik' => 'required',
            'tanggal_presentasi' => 'required',
            'jam' => 'required',
            'webinar' => 'required',
        ]);

        $pembicara->nama_pembicara = $request->input('nama_pembicara');
        $pembicara->topik = $request->input('topik');
        $pembicara->tanggal_presentasi = $request->input('tanggal_presentasi');
        $pembicara->jam = $request->input('jam');
        $pembicara->webinar_id = $request->input('webinar');

        if($request->hasFile('file_materi')){
            $file_old = $pembicara->file_materi;
            if($file_old){
                Storage::delete('/public/file_materi/'.$file_old);
            }

            $file = $request->file('file_materi');
            $upload_path = 'public/file_materi';
            $file_name = time().'_'.$file->getClientOriginalName();

            $file->storeAs($upload_path, $file_name);

            $pembicara->file_materi = '/storage/file_materi/'.$file_name;
            $pembicara->nama_file_materi = $file->getClientOriginalName();
        }

        $pembicara->save();

        return redirect(route('admin.pembicara'));
        
    }
}
