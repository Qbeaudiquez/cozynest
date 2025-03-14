document.addEventListener('DOMContentLoaded', () => {
    const linkViews = document.querySelectorAll('.incView');

    linkViews.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();

            const articleId = link.dataset.articleId;
            const targetUrl = link.href;

            console.log(`Article ID: ${articleId}`);
            console.log(`Target URL: ${targetUrl}`);

            fetch('https://cozynest-09845a7a31f4.herokuapp.com/backend/endpoint/addView.php', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ articleId: articleId })
            })
            .then(response => {
                console.log("Réponse reçue:", response);
                if (!response.ok) {
                    console.log("Réponse non OK:", response);
                    if (response.status >= 400 && response.status < 500) {
                        return response.json().then(data => {
                            console.log('Erreur de requête:', data);
                            throw new Error(data.message || 'Erreur de requête');
                        });
                    } else {
                        throw new Error('Erreur de connexion réseau');
                    }
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
                alert('Une erreur est survenue : ' + error.message);
            });

        });
    });
});