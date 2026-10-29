<nav class="fixed bottom-0 left-0 z-50 w-full border-t bg-white p-4">
    <div class="flex justify-around">
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('vocabulary.index') }}">Words</a>
        <a href="{{ route('grammar.index') }}">Grammar</a>
        <a href="{{ route('quiz.index') }}">Quiz</a>
        <a href="{{ route('bookmarks.store') }}">bookmarks</a>
    </div>
</nav>