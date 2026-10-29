<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request; 

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::with('vocabulary')
            ->where('user_id', 1)
            ->whereNotNull('vocabulary_id')
            ->get();

        return view('bookmarks.index', compact('bookmarks'));
    }

    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();

        return redirect()->route('bookmarks.index');
    }

    public function toggle(Request $request)
    {
        $vocabularyId = $request->input('vocabulary_id');

        $bookmark = Bookmark::where('user_id', 1)
            ->where('vocabulary_id', $vocabularyId)
            ->first();

        if($bookmark){
            $bookmark->delete();
        }else {
            Bookmark::create([
                'user_id' => 1,
                'vocabulary_id' => $vocabularyId,
            ]);
        }

        return back();
    }
}