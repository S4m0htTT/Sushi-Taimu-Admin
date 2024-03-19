function addAl() {
    var containerAllAl = document.getElementById('containerAllAl');
    var lastContainerAl = containerAllAl.lastElementChild;
    var inputs = lastContainerAl.querySelectorAll('input');
    var allFilled = true;
    inputs.forEach(function(input) {
        if (input.value.trim() === '') {
            allFilled = false;
        }
    });
    if (allFilled) {
        var newContainerAl = document.createElement('div');
        newContainerAl.classList.add('container_al');
        
        var input1 = document.createElement('input');
        input1.setAttribute('type', 'text');
        input1.setAttribute('name', 'aliments[' + containerAllAl.childElementCount + '][nom]');
        input1.setAttribute('oninput', 'verify()');
        input1.setAttribute('placeholder', 'nom al :');

        var input2 = document.createElement('input');
        input2.setAttribute('type', 'number');
        input2.setAttribute('name', 'aliments[' + containerAllAl.childElementCount + '][quantite]');
        input2.setAttribute('placeholder', 'quantite :');
        input2.setAttribute('oninput', 'verify()');

        newContainerAl.appendChild(input1);
        newContainerAl.appendChild(input2);
        containerAllAl.appendChild(newContainerAl);
    }
    verify()
}

function supprAl() {
    var containerAllAl = document.getElementById('containerAllAl');
    var containers = containerAllAl.querySelectorAll('.container_al');
    if (containers.length > 1) {
        containerAllAl.removeChild(containers[containers.length - 1]);
    }
    verify()
}

function addSav() {
    var containerAllSav = document.getElementById('containerAllSav');
    var lastContainerSav = containerAllSav.lastElementChild;
    var input = lastContainerSav.querySelector('input');
    if (input.value.trim() !== '') {
        var newContainerSav = document.createElement('div');
        newContainerSav.classList.add('container_sav');
        var newInput = document.createElement('input');
        newInput.setAttribute('type', 'text');
        newInput.setAttribute('name', 'saveurs[' + containerAllSav.childElementCount + '][nom]');
        newInput.setAttribute('placeholder', 'nom sav :');
        newInput.setAttribute('oninput', 'verify()');
        newContainerSav.appendChild(newInput);
        containerAllSav.appendChild(newContainerSav);
    }
    verify()
}

function supprSav() {
    var containerAllSav = document.getElementById('containerAllSav');
    var containers = containerAllSav.querySelectorAll('.container_sav');
    if (containers.length > 1) {
        containerAllSav.removeChild(containers[containers.length - 1]);
    }
    verify()
}

function verify() {
    var inputs = document.querySelectorAll('input[type="text"], input[type="number"], input[type="file"]');
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
verify();
