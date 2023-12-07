<?php

namespace App\Http\Controllers;

use App\Models\information;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    protected $information;

    public function __construct(information $information)
    {
        $this->information = $information;
    }

 
 
    public function index(){
        $info = $this->information->get();
        return view('information.index', compact('info'));
    }

    public function show(Request $request, $id=""){ 
        $data = [];
        if($id != "add"){
            $data = $this->information->find($id); 
        }  
        return view('information.form', compact('data'));
    }
    
    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'lokasi' => 'required|max:225',
            'deskripsi' => 'required',
            'kedalaman' => 'required',
            'magnitute' => 'required', 
        ]);
        if ($valid->fails()) {
            return response()->json(['status' => false, 'errors' => $valid->errors()]);
        }
        $res = ['status' => false,'msg'=>'errors', 'errors' => []];
        if($request->id =='add'){
            $this->information->create([
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'kedalaman' => $request->kedalaman,
                'magnitute' => $request->magnitute,
                'time' => Carbon::now(),
            ]);
            $res = ['status' => true,'msg'=>'Success add data', 'errors' => []];
        }else{
            $check = $this->information->find($request->id);
            $data = [
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'kedalaman' => $request->kedalaman,
                'magnitute' => $request->magnitute,
                'time' => Carbon::now(),
            ];
            $check->fill($data)->save(); 
            $res = ['status' => true,'msg'=>'Success edit data', 'errors' => []];
        }
        
        return response()->json($res);
    }
    public function destroy($id)
    {
        $check = $this->information->find($id);

        if ($check) {
            $check->delete();
            return response()->json(['status' => true, 'msg' => 'Berhasil Hapus Data'], Response::HTTP_OK);
        }
        return response()->json(['status' => false, 'msg' => 'Gagal Hapus Data'], Response::HTTP_BAD_REQUEST);
    }
}
