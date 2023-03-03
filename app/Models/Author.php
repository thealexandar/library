<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'author';

    public function getAuthors(){
        return $this->all();
    }

    public function createAuthor(array $data){
        return $this->create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'image' => $data['image'],
        ]);
    }

    public function updateAuthor(array $data, int $id){
        $author = $this->findOrFail($id);
        $author->name = $data['name'];
        $author->surname = $data['surname'];
        $author->save();
        return $author;
    }

    public function deleteAuthor(int $id){
        $author = $this->findOrFail($id);
        $author->delete();
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
