<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Author;

class AuthorController extends Controller
{
    protected $author;
            /**
     * Create a new controller instance.
     *
     * @return void
     * Author Model injected trough constructor
     */
    public function __construct(Author $author){
        $this->middleware('auth');
        $this->author = $author;
    }

    public function index(){
        $authors = $this->author->getAuthors();
        return view('authors', compact('authors'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $this->author->name = $request->name;
        $this->author->surname = $request->surname;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $filename);
            $this->author->image = $filename;
        }
        $this->author->save();
        return redirect()->route('authors');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        // dd($request->all());
        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->surname = $request->surname;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $filename);
            $author->image = $filename;
        }

        $author->save();
        return redirect()->route('authors');
    }

    public function destroy(Author $author)
    {
        $author->deleteAuthor($author->id);
        return redirect()->route('authors');
    }
}
