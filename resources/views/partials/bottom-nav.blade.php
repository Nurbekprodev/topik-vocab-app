<nav class="fixed bottom-0 left-0 z-50 w-full border-t border-slate-200 bg-white/95 px-2 py-2 backdrop-blur-sm">
    <div class="mx-auto flex max-w-xl items-center justify-around">

        {{-- Home --}}
        <a href="{{ route('dashboard') }}"
           class="flex min-w-0 flex-1 flex-col items-center gap-1 rounded-xl px-2 py-2 text-xs font-medium transition
           {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
            <i class="fa-solid fa-house text-lg"></i>
            <span>Home</span>
        </a>

        {{-- Words --}}
        <a href="{{ route('vocabulary.index') }}"
           class="flex min-w-0 flex-1 flex-col items-center gap-1 rounded-xl px-2 py-2 text-xs font-medium transition
           {{ request()->routeIs('vocabulary.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
            <i class="fa-solid fa-book-open text-lg"></i>
            <span>Words</span>
        </a>

        {{-- Grammar --}}
        <a href="{{ route('grammar.index') }}"
           class="flex min-w-0 flex-1 flex-col items-center gap-1 rounded-xl px-2 py-2 text-xs font-medium transition
           {{ request()->routeIs('grammar.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
            <i class="fa-solid fa-book text-lg"></i>
            <span>Grammar</span>
        </a>

        {{-- Quiz --}}
        <a href="{{ route('quiz.index') }}"
           class="flex min-w-0 flex-1 flex-col items-center gap-1 rounded-xl px-2 py-2 text-xs font-medium transition
           {{ request()->routeIs('quiz.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
            <i class="fa-solid fa-clipboard-list text-lg"></i>
            <span>Quiz</span>
        </a>

        {{-- Bookmarks --}}
        <a href="{{ route('bookmarks.index') }}"
           class="flex min-w-0 flex-1 flex-col items-center gap-1 rounded-xl px-2 py-2 text-xs font-medium transition
           {{ request()->routeIs('bookmarks.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
            <i class="fa-solid fa-bookmark text-lg"></i>
            <span>Saved</span>
        </a>

    </div>
</nav>