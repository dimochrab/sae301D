document.addEventListener('DOMContentLoaded', function() {
    console.log('Le script est en cours d\'exécution.');

    const registerBtn = document.getElementById('register');
    const container = document.getElementById('container');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });

    //---------------------CONNEXION-----------------------//
    var modifStatutButtonsSignupEtudiant = document.getElementById("etudiant_signup");
    var modifStatutButtonsSignupProf = document.getElementById("prof_signup");
    var afficheEtudiantSignup = document.getElementById("afficheEtudiant_signup");
    var afficheProfSignup = document.getElementById("afficheProf_signup");

    modifStatutButtonsSignupEtudiant.addEventListener("click", function () {
        afficheEtudiantSignup.style.opacity = "1";
        afficheProfSignup.style.opacity = "0";
    });

    modifStatutButtonsSignupProf.addEventListener("click", function () {
        afficheEtudiantSignup.style.opacity = "0";
        afficheProfSignup.style.opacity = "1";
    });

    var modifStatutButtonsSigninEtudiant = document.getElementById("etudiant_signin");
    var modifStatutButtonsSigninProf = document.getElementById("prof_signin");
    var afficheEtudiantSignin = document.getElementById("afficheEtudiant_signin");
    var afficheProfSignin = document.getElementById("afficheProf_signin");

    modifStatutButtonsSigninEtudiant.addEventListener("click", function () {
        afficheEtudiantSignin.style.opacity = "1";
        afficheProfSignin.style.opacity = "0";
    });

    modifStatutButtonsSigninProf.addEventListener("click", function () {
        afficheEtudiantSignin.style.opacity = "0";
        afficheProfSignin.style.opacity = "1";
    });


    //-------------------VALIDATION FORMULAIRE DE CONNEXION-------------------//
    var formSignIn = document.querySelector('.form-container.sign-in form');
    formSignIn.addEventListener('submit', function (event) {
        event.preventDefault();

        var prenom = document.getElementById('prenom_signin').value;
        var nom = document.getElementById('nom_signin').value;
        var mdp = document.getElementById('password1_signin').value;
        var statut = document.querySelector('input[name="statut"]:checked').value;

        fetch('data/etudiants.json')
            .then(response => response.json())
            .then(data => {
                var utilisateurTrouve = data.utilisateurs.find(function (utilisateur) {
                    return utilisateur.prenom.toLowerCase() === prenom.toLowerCase() &&
                        utilisateur.nom.toLowerCase() === nom.toLowerCase() &&
                        utilisateur.mdp === mdp &&
                        utilisateur.statut === statut;
                });

                if (!utilisateurTrouve) {
                    var utilisateursLocalStorage = JSON.parse(localStorage.getItem('utilisateurs'));

                    if (utilisateursLocalStorage) {
                        utilisateurTrouve = utilisateursLocalStorage.find(function (utilisateur) {
                            return utilisateur.prenom.toLowerCase() === prenom.toLowerCase() &&
                                utilisateur.nom.toLowerCase() === nom.toLowerCase() &&
                                utilisateur.mdp === mdp &&
                                utilisateur.statut === statut;
                        });
                    }
                }

                if (utilisateurTrouve) {
                    alert('Connexion réussie');
                    console.log('Avant la redirection');
                    window.location.href = '/home';
                } else {
                    console.log('Nom, prénom ou mot de passe incorrect(s)');
                }
            })
            .catch(error => {
                console.error('Erreur lors du chargement du fichier JSON', error);
            });
    });

    //-------------------INSCRIPTION-------------------//
    var formSignUp = document.querySelector('.form-container.sign-up form');
    formSignUp.addEventListener('submit', function (event) {
        event.preventDefault();

        var prenom = document.getElementById('prenom_signup').value;
        var nom = document.getElementById('nom_signup').value;
        var mdp = document.getElementById('password1_signup').value;
        var statut = document.querySelector('input[name="statut"]:checked').value;

        var utilisateurs = JSON.parse(localStorage.getItem('utilisateurs')) || [];

        var nouvelUtilisateur = {
            prenom: prenom,
            nom: nom,
            mdp: mdp,
            statut: statut,
        };

        utilisateurs.push(nouvelUtilisateur);
        localStorage.setItem('utilisateurs', JSON.stringify(utilisateurs));

        window.location.href = '/home';
    });
});


function togglePasswordVisibilitySignin() {
    var passwordInputSignin1 = document.getElementById("password1_signin");
    var passwordCheckboxSignin = document.getElementById("revealPassword_signin");

    if (passwordCheckboxSignin.checked) {
        passwordInputSignin1.type = "text";
    } else {
        passwordInputSignin1.type = "password";
    }
}