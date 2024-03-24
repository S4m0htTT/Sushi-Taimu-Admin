function addAl() {
    var containers = document.querySelectorAll('.container_al');
    const containerAll = document.getElementById('containerAllAl');
    var allInputsFilled = true;
    containers.forEach(function (container) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(function (input) {
            if (input.value.trim() === '') {
                allInputsFilled = false;
            }
        });
    });

    if (allInputsFilled) {
        var newContainer = document.createElement('div');
        newContainer.className = 'container_al';

        var newLabelNom = document.createElement('label');
        newLabelNom.textContent = 'Nom : ';
        newLabelNom.setAttribute('for', 'aliments[' + containers.length + '][nom]')

        var newInputNom = document.createElement('input');
        newInputNom.setAttribute('name', 'aliments[' + containers.length + '][nom]');
        newInputNom.setAttribute('type', 'text');
        newInputNom.setAttribute('value', '');
        newInputNom.setAttribute('oninput', 'verify()');

        var newLabelQuantity = document.createElement('label');
        newLabelQuantity.textContent = 'Quantité : ';
        newLabelQuantity.setAttribute('for','aliments[' + containers.length + '][quantite]' );

        var newInputQuantite = document.createElement('input');
        newInputQuantite.setAttribute('name', 'aliments[' + containers.length + '][quantite]');
        newInputQuantite.setAttribute('type', 'number');
        newInputQuantite.setAttribute('value', '');
        newInputQuantite.setAttribute('oninput', 'verify()');

        var newInputId = document.createElement('input');
        newInputId.setAttribute('name', 'aliments[' + containers.length + '][id]');
        newInputId.setAttribute('type', 'hidden');
        newInputId.setAttribute('value', 'new');

        newContainer.appendChild(newInputId);
        newContainer.appendChild(newLabelNom);
        newContainer.appendChild(newInputNom);
        newContainer.appendChild(newLabelQuantity);
        newContainer.appendChild(newInputQuantite);
        containerAll.appendChild(newContainer);
    } else {
        return;
    }
    verify();
}

function addSav() {
    var containers = document.querySelectorAll('#containerAllSav .container_sav');
    var allInputsFilled = true;
    containers.forEach(function (container) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(function (input) {
            if (input.value.trim() === '') {
                allInputsFilled = false;
            }
        });
    });

    if (allInputsFilled) {
        var newContainer = document.createElement('div');
        newContainer.className = 'container_sav';

        var newLabelNom = document.createElement('label');
        newLabelNom.textContent = 'Nom : ';
        newLabelNom.setAttribute('for', 'saveurs[' + containers.length + '][nom]');

        var newInputNom = document.createElement('input');
        newInputNom.setAttribute('name', 'saveurs[' + containers.length + '][nom]');
        newInputNom.setAttribute('type', 'text');
        newInputNom.setAttribute('value', '');
        newInputNom.setAttribute('oninput', 'verify()');

        var newInputId = document.createElement('input');
        newInputId.setAttribute('name', 'saveurs[' + containers.length + '][id]');
        newInputId.setAttribute('type', 'hidden');
        newInputId.setAttribute('value', 'new');


        newContainer.appendChild(newInputId);
        newContainer.appendChild(newLabelNom);
        newContainer.appendChild(newInputNom);
        document.getElementById('containerAllSav').appendChild(newContainer);
    } else {
        return;
    }
    verify();
}

function supprAl() {
    var container = document.getElementById('containerAllAl');
    var divs = container.getElementsByClassName('container_al');
    if (divs.length > 1) {
        container.removeChild(divs[divs.length - 1]);
    } else {
        return;
    }
    verify();
}

function supprSav() {
    var container = document.getElementById('containerAllSav');
    var divs = container.getElementsByClassName('container_sav');
    if (divs.length > 1) {
        container.removeChild(divs[divs.length - 1]);
    } else {
        return;
    }
    verify();
}

function verify() {
    var inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
    var isEmpty = false;

    inputs.forEach(function(input) {
        if (input.value.trim() == 0) {
            isEmpty = true;
        } else if (input.value.replace(/\s/g, '').length === 0) {
            isEmpty = true;
        }
    });

    var submitBtn = document.getElementById('submit');
    if (isEmpty) {
        submitBtn.disabled = true;
    } else {
        submitBtn.disabled = false;
    }
}