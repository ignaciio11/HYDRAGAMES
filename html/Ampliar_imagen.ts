const juego1Element = document.getElementById('juego1');

if (juego1Element) {
    juego1Element.addEventListener('mouseover', function() {
        this.classList.add('ampliar');
    });

    juego1Element.addEventListener('mouseout', function() {
        this.classList.remove('ampliar');
    });
}
