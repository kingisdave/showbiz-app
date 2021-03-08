<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prodcats = ProductCategory::orderBy('product_category', 'asc')->get();
        return view('pages.privates.shopper')
                ->with('prodcats', $prodcats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.privates.shopper');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //         'stockImage'=>'required',
        // ]);
        // if($request->hasFile('stockImage'))
        // {
        //     $imagesExt=['pdf','jpg','jpeg','png','docx'];
        //     $files = $request->file('stockImage');
        //     foreach($files as $file){
        //         $stockImages = $file->getClientOriginalName();
        //         $exten = $file->getClientOriginalExtension();
        //         $checked=in_array($exten,$imagesExt);
        //     //dd($checked);
        //         if($checked)
        //         {
        //             // $items= StockImage::create($request->all());
        //             foreach ($request->stockImage as $sImage) {
        //                 $stockImages = $sImage->store('stockImage');
        //                 StockImage::create([
        //                     'user_id' => 1,
        //                     'stockImages' => $stockImages
        //                 ]);
        //             }
        //             echo "Upload Successfully";
        //         } else {
        //             echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
        //         }
        //     }
        // }    
        // // $this->validate($request, [
        // //         'stockImage' => 'required',
        // //         'stockImage.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        // // ]);
        // // if($request->hasFile('stockImage'))
        // // {
        // //     foreach($request->file('stockImage') as $sImage)
        // //     {
        // //         $sName = time().'.'.$sImage->extension();
        // //         $sImage->move(public_path().'public/stockgallery/', $sName);
        // //         $data[] = $sName;
        // //     }  
        // // }
        // // $this->validate($request, [
        // //         'image' => 'required',
        // //         'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        // // ]);
        // // if($request->hasFile('image')){
        // //     foreach($request->file('image') as $stockImage)
        // //     {
        // //         return $stockImage;
        // //         $name = $stockImage->getClientOriginalName();
        // //         $stockImage->move(public_path().'/stockgallery/', $name);
        // //         $data[] = $name;
        // //     }  
        // // }
        // $myImage = new StockImage;
        // $myImage->user_id = '1';
        // $myImage->stockImages = json_encode($data);
        // $myImage->save;
        // return back()->with('successMessage', 'Your image uploads is successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
