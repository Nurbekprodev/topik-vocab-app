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
            ->paginate(5);

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

        if ($bookmark) {
            $bookmark->delete();
            $isBookmarked = false;
        } else {
            Bookmark::create([
                'user_id' => 1,
                'vocabulary_id' => $vocabularyId,
            ]);

            $isBookmarked = true;
        }

        if ($request->expectsJson()) {
            return response()->json([
                'bookmarked' => $isBookmarked,
            ]);
        }

        return back();
    }
}