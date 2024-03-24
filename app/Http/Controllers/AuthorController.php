<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.authors.index', [
            'authors' => Author::orderBy('id', 'DESC')->paginate(6),
            'routeName' => Route::currentRouteName()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create',[
            'routeName' => Route::currentRouteName()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '-' . time() . '.' . $image->extension();
            $uploadPath = 'images/authors/';
            $image->move(public_path($uploadPath), $imageName);
        } else {
            $imageName = null;
        }
        $first_name = ["ka" => $data['first_name_ka'], "en" => $data['first_name_en'], "ru" => $data['first_name_ru']];
        $last_name = ["ka" => $data['last_name_ka'], "en" => $data['last_name_en'], "ru" => $data['last_name_ru']];


        Author::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'image' => $imageName,
        ]);
        return redirect() -> route('authors.index', ['language' => App::getLocale()]) -> with('success', 'ავტორი შეიქმნა წარმატებით');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $language,Author $author)
    {
        return view('admin.authors.edit',[
           'author' => $author,
            'routeName' => Route::currentRouteName()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, string $language, Author $author)
    {
        $imageName = null;
        $data = $request->validated();
        if($request->hasFile('image')){
            $image = $request -> image;
            $imageName = uniqid() . '-' . time() .'.'. $image -> extension(); // TODO: Generate new File Name
            $uploadPath = 'images/authors/'; // TODO: Set Upload Path
            $isUploaded = $image->move(public_path($uploadPath), $imageName); // TODO: Store File in Public Directory
            if(!$isUploaded) return redirect() -> back()-> with('warning', 'სურათის ატვირთვა ვერ მოხერხდა, სცადეთ თავიდან');
        }
        $first_name = ["ka" => $data['first_name_ka'], "en" => $data['first_name_en'], "ru" => $data['first_name_ru']];
        $last_name = ["ka" => $data['last_name_ka'], "en" => $data['last_name_en'], "ru" => $data['last_name_ru']];
        $updatedData = [
            'first_name' => $first_name,
            'last_name' => $last_name,
        ];

        if ($imageName) $updatedData = [...$updatedData, 'image' => $imageName];
        $author -> update($updatedData);
        return redirect() -> back() -> with('success', 'ავტორი განახლდა წარმატებით');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $language, Author $author)
    {
        $author -> delete();
        return redirect() -> route('authors.index', ['language' => App::getLocale()]) -> with('success', 'ავტორი წარმატებით წაიშალა.');
    }
}
