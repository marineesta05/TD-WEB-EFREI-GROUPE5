// Ouvrir la popup
document.getElementById('openPopup').addEventListener('click', function () {
    const popup = document.getElementById('popup');
    popup.style.display = 'flex'; // Affiche la popup
});

// Fermer la popup
document.getElementById('closePopup').addEventListener('click', function () {
    const popup = document.getElementById('popup');
    popup.style.display = 'none'; // Masque la popup
});
