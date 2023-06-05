<?php

namespace App\Http\Controllers\API;
use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        try
        {
        $product = Product::all();
        return response()->json([
            'succes' => true,
            'message' => 'List data Product',
            'error' => null,
            'data' => $product
        ], Response::HTTP_OK);
        }
        catch (\Throwable $th){
        return response()->json([
            'succes' => false,
            'message' => 'server sedang error',
            'error' => $th->getMessage(),
            'data' => null,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
        $validator = Validator::make($request->all(),[
            'foto_kos'=>'required|image|mimes:jpeg,png,svg,jpg,gif,jfif|max:3000',
            'foto_pemilik'=>'required|image|mimes:jpeg,png,svg,jpg,gif,jfif|max:3000',
            'nama_pemilik'=>['required', 'string', 'max:50'],
            'nama_kos'=>['required', 'string', 'max:50'],
            'lokasi_kos'=>['required', 'string',],
            'harga_kos'=>['required', 'integer',],

        ]);

        if($validator->fails()){
            return response()->json([
                'succes' => false,
                'message' => 'Data Tidak Valid',
                'error' => $validator->errors()->first(),
                'data' => null,
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            // if ($request->hasFile('foto_kos'))
            //     $foto_kos = $request->file('foto_kos');
            //     $fotoPath = $foto_kos->store('public/foto');
            //     $fotoUrl = Storage::url($fotoPath);

            if($request->foto_kos){

                $fotoKos = $this->generateRandomString();
                $extension = $request->foto_kos->extension();

                Storage::putFileAs('public/foto', $request->foto_kos, $fotoKos.'.'.$extension);
            }
            if($request->foto_pemilik){

                $fotoPemilik = $this->generateRandomString();
                $extension = $request->foto_kos->extension();

                Storage::putFileAs('public/foto', $request->foto_pemilik, $fotoPemilik.'.'.$extension);
            }
                $request['foto_kos'] = $fileName.'.'.$extension;
                $request['foto_pemilik'] = $fotoPemilik.'.'.$extension;

                $product = Product::create([
                'foto_kos'=> $fotoKos,
                'foto_pemilik'=> $fotoPemilik,
                'nama_pemilik'=> $request->nama_pemilik,
                'nama_kos'=> $request->nama_kos,
                'lokasi_kos'=> $request->lokasi_kos,
                'harga_kos'=> $request->harga_kos
                ]);



                $data2 = Product::where('id', $product->id)->first();

            return response()->json([
                'succes' => true,
                'message' => 'Data Berhasil Di Tambahkan',
                'data' => $data2,
            ], Response::HTTP_CREATED);

        }

        catch (\Throwable $th){
            return response()->json([
                'succes' => false,
                'message' => 'server sedang error',
                'error' => $th->getMessage(),
                'data' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function getproduct(Product $product)
    {
        // try
        // {
        // return response()->json([
        //     'succes' => true,
        //     'message' => 'detail data Product',
        //     'error' => null,
        //     'data' => $product
        // ], Response::HTTP_OK);
        // }
        // catch (\Throwable $th){
        // return response()->json([
        //     'succes' => false,
        //     'message' => 'server sedang error',
        //     'error' => $th->getMessage(),
        //     'data' => null,
        // ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $product = Product::findOrFail($id);
        // $validator = Validator::make($request->all(), [
        //     'foto_kos'=>'required|string',
        //     'foto_pemilik'=>'required|string',
        //     'nama_pemilik'=>'required|string', 'max:50',
        //     'nama_kos'=>'required|string', 'max:50',
        //     'lokasi_kos'=>'required|string',
        //     'harga_kos'=>'required|integer',
        // ]);

        // if($validator->fails()){
        //     return response()->json([
        //         'succes' => false,
        //         'message' => 'Terdapat Data Tidak Valid',
        //         'error'=> $validator->errors()->first()
        //     ], Response::HTTP_UNPROCESSABLE_ENTITY);
        // }
        // try{
        //     $product->update($request->all());
        //     return response()->json([
        //         'succes' => true,
        //         'message' => 'Berhasil Mengubah Product',
        //         'error' => null,
        //         'data' => $product
        //     ], Response::HTTP_CREATED);
        // }
        // catch(\Throwable$th) {
        //     return Response()->json([
        //         'succes' => false,
        //         'message'=> 'Terjadi kesalahan pada server',
        //         'error' => $th->getMessage(),
        //         'data' => null
        //     ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
