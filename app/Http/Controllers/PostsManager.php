<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsManager extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert()
    {
        DB::insert('insert into Posts (author_id, Title, content) values ( ?, ?, ?)', [Auth::user()->id, $_REQUEST['title'], $_REQUEST['content']]);
        return redirect()->route('home');
    }

    public function viewPost()
    {
        if (!empty($_REQUEST['comentator_id']))
        {
            $commentator_id = $_REQUEST['comentator_id'];
            $post_id = $_REQUEST['id_post'];
            $content = $_REQUEST['content'];
            DB::insert("insert into comments (comentator_id,content,post_id) values (?,?,?)",[$commentator_id,$content,$post_id]);
        }
        $post = DB::select('select * from Posts where id =' . $_REQUEST['id_post']);


        $comments = DB::select('select content,name from comments LEFT JOIN users ON comments.comentator_id = users.id where post_id =' . $_REQUEST['id_post']);

        return view('comments.comments', ['title' => 'Comment', 'post' => $post[0], 'comments' =>$comments]);
    }
}
