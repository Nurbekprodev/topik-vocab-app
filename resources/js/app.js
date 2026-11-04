import './bootstrap';


document.addEventListener('click', (event) => {
    // Show or hide the word meaning and examples
    const meaningButton = event.target.closest('#show-meaning-btn');

    if (meaningButton) {
        const meaningSection = document.getElementById('meaning-section');

        if (!meaningSection) return;

        const isHidden = meaningSection.hidden;

        meaningSection.hidden = !isHidden;

        meaningButton.setAttribute('aria-expanded', String(isHidden));

        meaningButton.innerHTML = isHidden
            ? '<i class="fa-regular fa-eye-slash text-blue-600"></i><span>Hide Meaning</span>'
            : '<i class="fa-regular fa-eye text-blue-600"></i><span>Show Meaning</span>';

        return;
    }

    // Play Korean pronunciation using browser speech synthesis
    const audioButton = event.target.closest('[data-play-audio]');

    if (audioButton) {
        const text = audioButton.dataset.word?.trim();

        if (!text || !('speechSynthesis' in window)) {
            console.warn('Korean audio playback is not supported in this browser.');
            return;
        }

        window.speechSynthesis.cancel();

        const utterance = new SpeechSynthesisUtterance(text);

        utterance.lang = 'ko-KR';
        utterance.rate = 0.85;
        utterance.pitch = 1;

        window.speechSynthesis.speak(utterance);
    }
});


// vocabulary learn page

    function speakKorean(button) {
        if (!('speechSynthesis' in window)) {
            alert('Audio playback is not supported in this browser.');
            return;
        }

        // Stop the previous sentence before playing another.
        window.speechSynthesis.cancel();

        const text = button.dataset.text;
        const utterance = new SpeechSynthesisUtterance(text);

        utterance.lang = 'ko-KR';
        utterance.rate = 0.85;
        utterance.pitch = 1;

        const voices = window.speechSynthesis.getVoices();
        const koreanVoice = voices.find(voice =>
            voice.lang.toLowerCase().startsWith('ko')
        );

        if (koreanVoice) {
            utterance.voice = koreanVoice;
        }

        window.speechSynthesis.speak(utterance);
    }


    // vocabulary main page
    
document.addEventListener('DOMContentLoaded', () => {
    
    const searchInput = document.getElementById('vocab-search');
    const searchForm = document.getElementById('vocab-search-form');
    const clearSearch = document.getElementById('clear-search');

    if (searchInput && searchForm && clearSearch) {
        const updateClearButton = () => {
            clearSearch.classList.toggle(
                'hidden',
                searchInput.value.length === 0
            );
        };

        searchInput.addEventListener('input', updateClearButton);

        // Search automatically after the user stops typing.
        let searchTimeout;

        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(() => {
                searchForm.requestSubmit();
            }, 400);
        });

        // Clear search and reload the complete list.
        clearSearch.addEventListener('click', () => {
            searchInput.value = '';
            searchForm.requestSubmit();
        });

        updateClearButton();
    }


    // Expand and collapse vocabulary cards.
    document.querySelectorAll('[data-expand]').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('[data-vocab-card]');

            if (!card) return;

            const details = card.querySelector('[data-details]');
            const chevron = card.querySelector('[data-chevron]');

            if (!details) return;

            const isExpanded =
                button.getAttribute('aria-expanded') === 'true';

            button.setAttribute(
                'aria-expanded',
                String(!isExpanded)
            );

            details.classList.toggle('hidden', isExpanded);

            if (chevron) {
                chevron.classList.toggle('rotate-180', !isExpanded);
            }
        });
    });

    // Toggle bookmark appearance.
    // This changes the UI only; persistent saving requires a backend.
    document.querySelectorAll('[data-bookmark]').forEach(button => {
        button.addEventListener('click', () => {
            const isBookmarked =
                button.getAttribute('aria-pressed') === 'true';

            const icon = button.querySelector('[data-bookmark-icon]');

            button.setAttribute(
                'aria-pressed',
                String(!isBookmarked)
            );

            if (icon) {
                icon.classList.toggle('fa-solid', !isBookmarked);
                icon.classList.toggle('fa-regular', isBookmarked);
            }

            button.classList.toggle('bg-indigo-50', !isBookmarked);
            button.classList.toggle('text-indigo-600', !isBookmarked);
            button.classList.toggle('text-slate-400', isBookmarked);
        });
    });
});



// vocabulary.index, audio reader for each word
document.querySelectorAll('[data-speak]').forEach(button => {
    button.addEventListener('click', event => {
        event.stopPropagation();

        const word = button.dataset.speak;

        if (!('speechSynthesis' in window)) {
            alert('Audio playback is not supported by this browser.');
            return;
        }

        window.speechSynthesis.cancel();

        const utterance = new SpeechSynthesisUtterance(word);
        utterance.lang = 'ko-KR';
        utterance.rate = 0.85;

        window.speechSynthesis.speak(utterance);
    });

    button.addEventListener('keydown', event => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            button.click();
        }
    });
});

// quiz.vocabulary.custom
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('quiz-form');

    const questions = Array.from(
        document.querySelectorAll('[data-question]')
    );

    const previousBtn = document.getElementById('previous-btn');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');

    const currentNumber = document.getElementById('current-number');
    const progressBar = document.getElementById('progress-bar');
    const message = document.getElementById('quiz-message');

    let currentIndex = 0;

    function hasAnswer(index) {
        return questions[index].querySelector(
            'input[type="radio"]:checked'
        ) !== null;
    }

    function showQuestion(index) {

        questions.forEach((question, i) => {
            question.classList.toggle('hidden', i !== index);
        });

        currentIndex = index;

        currentNumber.textContent = index + 1;

        progressBar.style.width =
            ((index + 1) / questions.length * 100) + '%';

        previousBtn.disabled = index === 0;

        nextBtn.classList.toggle(
            'hidden',
            index === questions.length - 1
        );

        submitBtn.classList.toggle(
            'hidden',
            index !== questions.length - 1
        );

        message.textContent = '';

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    nextBtn.addEventListener('click', function () {

        if (!hasAnswer(currentIndex)) {
            message.textContent = 'Please select an answer first.';
            return;
        }

        showQuestion(currentIndex + 1);

    });

    previousBtn.addEventListener('click', function () {

        if (currentIndex > 0) {
            showQuestion(currentIndex - 1);
        }

    });

    form.addEventListener('submit', function (event) {

        const unansweredIndex = questions.findIndex(
            (_, index) => !hasAnswer(index)
        );

        if (unansweredIndex !== -1) {

            event.preventDefault();

            showQuestion(unansweredIndex);

            message.textContent =
                'Please answer this question before finishing the quiz.';

        }

    });

    // Clear validation message when an answer is selected.
    form.addEventListener('change', function () {
        message.textContent = '';
    });

});