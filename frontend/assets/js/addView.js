document.addEventListener('DOMContentLoaded', () => {
    const linkViews = document.querySelectorAll('.incView');

    linkViews.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();

            const articleId = link.dataset.articleId;
            const targetUrl = link.href;

            
            console.log("Article ID:", articleId);

            
            fetch('/backend/addView.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ articleId: articleId })
            })
            .then(response => {
                console.log("Réponse reçue:", response);
                if (!response.ok) {
                    throw new Error('Erreur de connexion réseau');
                }
            
                return response.json();
            })
            .then(data => {
                console.log("Données de la réponse:", data);
            
                if (data.message === 'Compteur de vues mis à jour') {
                    console.log('Vues mises à jour avec succès');
                } else {
                    console.error('Problème lors de la mise à jour des vues');
                }
            
                window.location.href = targetUrl;
            })
            .catch(error => {
                console.error('Erreur', error);
                alert('Une erreur est survenue');
            });
            
        });
    });
});

