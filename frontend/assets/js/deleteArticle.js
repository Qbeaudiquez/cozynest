const button = document.getElementById('button')

button.addEventListener('click', () => {
    fetch("/backend/src/deleteArticle.php")
        .then(response => response.text())
        .then(data => {
            console.log("Réponse du serveur :", data)
        })
        .catch(error => {
            console.error("Erreur lors de l'exécution du script PHP :", error)
        })
})
