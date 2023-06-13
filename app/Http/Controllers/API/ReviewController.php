<?php

namespace App\Http\Controllers\API;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        try
        {
        $review = Review::all();
        return response()->json([
            'succes' => true,
            'message' => 'List data Product',
            'error' => null,
            'reviews' => $review
        ], Response::HTTP_OK);
        }
        catch (\Throwable $th){
        return response()->json([
            'succes' => false,
            'message' => 'server sedang error',
            'error' => $th->getMessage(),
            'reviews' => null,
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
    public function addreview(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_review'=>['required', 'string', 'max:50'],
            'profil_review'=>'required|image|mimes:jpeg,png,svg,jpg,gif,jfif|max:3000',
            'review_desc'=>['required', 'string', 'max:300'],

        ]);

        if($validator->fails()){
            return response()->json([
                'succes' => false,
                'message' => 'Data Tidak Valid',
                'error' => $validator->errors()->first(),
                'reviews' => null,
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $file_request = $request->file('profil_review');
        $file_name = $file_request->getClientOriginalName();

        try{
            // if($request->profil_review){

            //     $profilReview = $this->generateRandomString();
            //     $extension = $request->profil_review->extension();

            //     Storage::putFileAs('public/person', $request->profil_review, $profilReview.'.'.$extension);
            // }

            // $request['profil_review'] = $profilReview.'.'.$extension;

            $review = Review::create([
            'profil_review'=> $file_request->storeAs('person', $file_name),
            'nama_review'=> $request->nama_review,
            'review_desc'=> $request->review_desc,
            ]);



            $data3 = Review::where('id', $review->id)->first();

        return response()->json([
            'succes' => true,
            'message' => 'Data Berhasil Di Tambahkan',
            'reviews' => $data3,
        ], Response::HTTP_CREATED);

    }catch (\Throwable $th){
        return response()->json([
            'succes' => false,
            'message' => 'server sedang error',
            'error' => $th->getMessage(),
            'reviews' => null,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
