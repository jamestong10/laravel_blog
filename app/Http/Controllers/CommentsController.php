<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $id) {
        $request->validate([
            'body' => 'required|min:10'
        ]);

        try {
            $comment = new Comment;
            $comment->body = $request['body'];
            $comment->post_id = $id;
            $comment->save();
        } catch(\Exception $e) {
            echo $e->getMessage();
            return back()->withError('留言建立失敗');
        }

        return back();
    }
}
