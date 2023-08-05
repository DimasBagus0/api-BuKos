<?php

namespace App\Http\Controllers\API;
use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
                'success' => true,
                'message' => 'List data Product',
                'error' => null,
                'product' => $product
            ], Response::HTTP_OK);
        }
        catch (\Throwable $th){
            return response()->json([
                'success' => false,
                'message' => 'Server sedang error',
                'error' => $th->getMessage(),
                'product' => null,
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
            'foto_kos' => 'required|image|mimes:jpeg,png,svg,jpg,gif,jfif|max:3000',
            'foto_pemilik'=>'required|image|mimes:jpeg,png,svg,jpg,gif,jfif|max:3000',
            'nama_pemilik'=>['required', 'string', 'max:50'],
            'nama_kos'=>['required', 'string', 'max:50'],
            'lokasi_kos'=>['required', 'string',],
            'harga_kos'=>['required', 'numeric',],
            'spesifikasi_kamar'=>['string',],
            'fasilitas_kamar'=>['string',],
            'fasilitas_umum'=>['string',],
            'peraturan_kamar'=>['string',],
            'peraturan_kos'=>['string',],
            'tipe_kamar'=>['string',],
            'alamat_kos'=>['string']
            // 'favorite' => [],
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Valid',
                'error' => $validator->errors()->first(),
                'product' => null,
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = Auth::user();
        if ($user->role !== 'owner') {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki izin untuk menambahkan produk.',
                'error' => 'Unauthorized',
                'product' => null,
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user_id = $user->id; // Mendapatkan ID pengguna

        $file_request = $request->file('foto_pemilik');
        $file_name = $file_request->getClientOriginalName();


        $file_fotokos = $request->file('foto_kos');
        $name_fotokos = $file_fotokos->getClientOriginalName();

        try{
            $product = Product::create([
                'user_id' => $user_id, // Menyimpan ID pengguna
                'foto_kos'=> $file_fotokos->storeAs('fotokos', $name_fotokos),
                'foto_pemilik'=> $file_request->storeAs('person', $file_name),
                'nama_pemilik'=> $request->nama_pemilik,
                'nama_kos'=> $request->nama_kos,
                'lokasi_kos'=> $request->lokasi_kos,
                'harga_kos'=> $request->harga_kos,
                'spesifikasi_kamar'=> $request->spesifikasi_kamar,
                'fasilitas_kamar'=> $request->fasilitas_kamar,
                'fasilitas_umum'=> $request->fasilitas_umum,
                'peraturan_kamar'=> $request->peraturan_kamar,
                'peraturan_kos'=> $request->peraturan_kos,
                'tipe_kamar'=> $request->tipe_kamar,
                'alamat_kos' => $request->alamat_kos,
            ]);

            $data2 = Product::where('id', $product->id)->first();

            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Di Tambahkan',
                'product' => $data2,
            ], Response::HTTP_CREATED);

        } catch (\Throwable $th){
            return response()->json([
                'success' => false,
                'message' => 'Server sedang error',
                'error' => $th->getMessage(),
                'product' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function productowner(){
        $user = Auth::user();
        if ($user->role !== 'owner') {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki izin untuk melihat produk.',
                'error' => 'Unauthorized',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Mendapatkan daftar produk berdasarkan ID pemilik (owner)
        $product = Product::where('user_id', $user->id)->get();
        if ($product->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Tidak ada produk yang ditemukan untuk pengguna ini.',
                'product' => null,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Produk Berhasil Diambil',
            'product' => $product,
        ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('Search');
        $filterByType = $request->input('Filter_kos');
        $filterByAlamatKos = $request->input('Filter_desa');

        $query = Product::query();

        if ($searchQuery) {
            $query->where('nama_kos', 'like', '%' . $searchQuery . '%');
        }

        if ($filterByType) {
            $query->where('tipe_kamar', $filterByType);
        }

        if ($filterByAlamatKos) {
            $query->where('alamat_kos', $filterByAlamatKos);
        }

        $product = $query->get();

        if ($product->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Kos Tidak Di Temukan',
                'data' => null,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hasil pencarian',
            'data' => $product
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function getproduct($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Kos Tidak Di Temukan',
            'data' => null,
        ], Response::HTTP_NOT_FOUND);
    }

    return response()->json([
        'success' => true,
        'message' => 'Detail data Product',
        'data' => $product,
    ], Response::HTTP_OK);
}

public function editAndUpdate(Request $request, $id)
{
    // Pastikan hanya pemilik yang bisa mengedit produk
    $user = Auth::user();
    if ($user->role !== 'owner') {
        return response()->json([
            'success' => false,
            'message' => 'Anda tidak memiliki izin untuk melakukan tindakan ini.',
            'error' => 'Unauthorized',
            'product' => null,
        ], Response::HTTP_UNAUTHORIZED);
    }

    // Temukan data produk berdasarkan ID
    $product = Product::find($id);

    // Periksa apakah produk ditemukan
    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan.',
            'product' => null,
        ], Response::HTTP_NOT_FOUND);
    }

    if ($request->isMethod('get')) {
        // Jika method adalah GET, kembalikan data produk untuk diedit
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan data produk untuk diedit',
            'data' => $product,
        ], Response::HTTP_OK);
    } elseif ($request->isMethod('put')) {
        // Jika method adalah PUT, lakukan validasi dan simpan perubahan data produk
        $validator = Validator::make($request->all(), [
            'nama_kos' => ['string', 'max:50'],
            'harga_kos' => ['numeric'],
            'spesifikasi_kamar' => ['string'],
            'fasilitas_kamar' => ['string'],
            'fasilitas_umum' => ['string'],
            'peraturan_kamar' => ['string'],
            'peraturan_kos' => ['string'],
            'tipe_kamar' => ['string'],
            'alamat_kos'=> ['string'],
            'foto_kos' => ['image', 'mimes:jpeg,png,svg,jpg,gif,jfif', 'max:3000'],
            'foto_pemilik' => ['image', 'mimes:jpeg,png,svg,jpg,gif,jfif', 'max:3000'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Valid',
                'error' => $validator->errors()->first(),
                'product' => null,
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            // Update fields other than images
            $product->update($request->except(['foto_kos', 'foto_pemilik']));

            // Update images if provided
            if ($request->hasFile('foto_kos')) {
                $file_fotokos = $request->file('foto_kos');
                $name_fotokos = $file_fotokos->getClientOriginalName();
                $product->foto_kos = $file_fotokos->storeAs('fotokos', $name_fotokos);
                $product->save();
            }

            if ($request->hasFile('foto_pemilik')) {
                $file_request = $request->file('foto_pemilik');
                $file_name = $file_request->getClientOriginalName();
                $product->foto_pemilik = $file_request->storeAs('person', $file_name);
                $product->save();
            }

            // Ambil data terbaru setelah di-update
            $updatedProduct = Product::find($id);

            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diperbarui',
                'product' => $updatedProduct,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server',
                'error' => $th->getMessage(),
                'product' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    } else {
        // Jika method selain GET atau PUT, tampilkan pesan error
        return response()->json([
            'success' => false,
            'message' => 'Metode tidak diizinkan.',
            'product' => null,
        ], Response::HTTP_METHOD_NOT_ALLOWED);
    }
}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */



// Pada function favorite:
public function favorite($id)
{
    $user = Auth::user();

    // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses endpoint ini
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Anda harus login untuk menambahkan ke favorit.',
            'product' => null,
        ], Response::HTTP_UNAUTHORIZED);
    }

    $product = Product::find($id);

    // Periksa apakah produk ditemukan
    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan.',
            'product' => null,
        ], Response::HTTP_NOT_FOUND);
    }

    // Cek apakah produk sudah ada di daftar favorit pengguna
    $isFavorited = $user->favorites()->where('product_id', $product->id)->exists();

    // Lakukan tindakan berdasarkan status favorit
    if ($isFavorited) {
        // Hapus produk dari daftar favorit
        $user->favorites()->detach($product->id);
        // Perbarui status favorit pada model Product
        $product->update(['favorite' => false]); // Ubah nilai favorite menjadi false (0)
        $message = 'Produk dihapus dari favorit.';
    } else {
        // Tambahkan produk ke daftar favorit
        $user->favorites()->attach($product->id);
        // Perbarui status favorit pada model Product
        $product->update(['favorite' => true]); // Ubah nilai favorite menjadi true (1)
        $message = 'Produk ditambahkan ke favorit.';
    }
    return response()->json([
        'success' => true,
        'message' => $message,
        'product' => $product,
    ], Response::HTTP_OK);
}


public function getFavorites()
{
    $user = Auth::user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Anda harus login untuk melihat produk favorit.',
            'favorites' => null,
        ], Response::HTTP_UNAUTHORIZED);
    }

    $favorites = $user->favorites()->get();

    return response()->json([
        'success' => true,
        'message' => 'Daftar produk favorit.',
        'favorites' => $favorites,
    ], Response::HTTP_OK);
}


    public function destroy($id)
{  $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Product not found',
            'product' => null,
        ], Response::HTTP_NOT_FOUND);
    }

    // Pastikan hanya pemilik yang bisa menghapus produk
    $user = Auth::user();
    if ($user->role !== 'owner') { // Pemeriksaan apakah peran pengguna adalah "owner"
        return response()->json([
            'success' => false,
            'message' => 'Anda tidak memiliki izin untuk melakukan tindakan ini.',
            'error' => 'Unauthorized',
            'product' => null,
        ], Response::HTTP_UNAUTHORIZED);
    }

    try {
        // Hapus produk dari database
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Berhasil Di Hapus',

        ], Response::HTTP_OK);
    } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Server Sedang Error',
            'error' => $th->getMessage(),
            'product' => null,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */

