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
