function addAl() {
    var containers = document.querySelectorAll('.container_al');
    const containerAll = document.getElementById('containerAllAl');
    var allInputsFilled = true;

    containers.forEach(function(container) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                allInputsFilled = false;
            }
        });
    });

    if (allInputsFilled) {
        var newContainer = document.createElement('div');
        newContainer.className = 'container_al';

        var newInputNom = document.createElement('input');
        newInputNom.setAttribute('name', 'aliments[' + containers.length + '][nom]');
        newInputNom.setAttribute('type', 'text');
        newInputNom.setAttribute('value', '');

        var newInputQuantite = document.createElement('input');
        newInputQuantite.setAttribute('name', 'aliments[' + containers.length + '][quantite]');
        newInputQuantite.setAttribute('type', 'number');
        newInputQuantite.setAttribute('value', '');

        newContainer.appendChild(newInputNom);
        newContainer.appendChild(newInputQuantite);

        containerAll.appendChild(newContainer);
    } else {
        alert('Tous les champs d\'entrée doivent être remplis.');
    }
}

function addSav() {
    var containers = document.querySelectorAll('#containerAllSav .container_sav');
    var allInputsFilled = true;

    containers.forEach(function(container) {
        var input = container.querySelector('input');
        if (input.value.trim() === '') {
            allInputsFilled = false;
        }
    });

    if (allInputsFilled) {
        var newContainer = document.createElement('div');
        newContainer.className = 'container_sav';

        var newInputNom = document.createElement('input');
        var numContainers = containers.length; // Nombre de conteneurs actuels
        newInputNom.setAttribute('name', 'saveurs[' + numContainers + '][nom]');
        newInputNom.setAttribute('type', 'text');
        newInputNom.setAttribute('value', '');

        newContainer.appendChild(newInputNom);

        document.getElementById('containerAllSav').appendChild(newContainer);
    } else {
        alert('Tous les champs d\'entrée doivent être remplis.');
    }
}