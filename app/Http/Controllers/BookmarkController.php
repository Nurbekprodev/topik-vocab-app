<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;

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
}