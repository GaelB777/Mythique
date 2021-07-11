$(document).ready(function () {
    let successName = false;
    let successPrenom = false;
    let successGender = false;
    let successCountry = false;
    let emailsuccess = false;
    let successMdp = false;
    let tableauTest;

    let passwordRegex = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@=àç_#'"é&^ù!:;,])\S{6,12}$/)
    let emailRegex = new RegExp(/^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/)


    /*    !!!!!!!!!AJAX CONNEXION!!!!!!!!!*/

    $("#seConnecter").on('click', function (e) {
        console.log('click');
        e.preventDefault();

        let getEmail = $("#emailConnexion").val();
        let getMdp = $("#mdpConnexion").val();

        if (getEmail === "" || getMdp === "") {
            alert('please check your input !');
        } else {
            console.log('AJAX 1');

            $.ajax(
                {
                    url: 'controllers/login.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        emailPHP: getEmail,
                        passwordPHP: getMdp,
                    },
                    success: function (data)
                    {

                        if (data === "connexion success") {
                            console.log('connecté');
                            window.location.href = './account';
                        } else {
                            window.alert('Email ou mot de passe incorrect !');
                        }
                    }
                });
        }
    });

    // !!!!!!!!!!!!AJAX DECONNECTION!!!!!!!!!!!!!!!!!!!

    $('#logged_out').click(function () {

        $.ajax(
            {
                url: 'controllers/logged_out.php',
                success: function (data) {
console.log('reket ok');
                    if (data === 'success') {
                        // console.log('Connexion (JQUERY) OK');
                        window.location.href = './accueil';
                    }
                }
            });

    });


    /*    !!!!!!!!!AJAX INSCRIPTION!!!!!!!!!*/

    $('#name').keyup(function () {

        if ($('#name').val().length < 3 || $('#name').val().length > 16) {
            successName = false;
            $("#output_checkuser").text('Le nom doit comporter entre 3 et 16 caractères !');
            $("#output_checkuser").css("color", "red");
            $("#output_checkuser").css("margin", "-15px 0 5px 0");
        } else if ($.isNumeric($('#name').val().substr(0, 1))) {

            $("#output_checkuser").text('Le premier caractère doit être une lettre');
            $("#output_checkuser").css("color", "red");
            $("#output_checkuser").css("margin", "-15px 0 5px 0");
        } else {
            $("#output_checkuser").text("");
            successName = true;
        }
    });

    $('#secondName').keyup(function () {
        if ($('#secondName').val().length < 3 || $('#secondName').val().length > 16) {
            successPrenom = false;
            $("#output_checkuser2").text('Le prénom doit comporter entre 3 et 16 caractères !');
            $("#output_checkuser2").css("color", "red");
            $("#output_checkuser2").css("margin", "-15px 0 5px 0");
        } else if ($.isNumeric($('#secondName').val().substr(0, 1))) {
            successPrenom = false;
            $("#output_checkuser2").text('Le premier caractère doit être une lettre');
            $("#output_checkuser2").css("color", "red");
            $("#output_checkuser2").css("margin", "-15px 0 5px 0");
        } else {
            $("#output_checkuser2").text("");
            successPrenom = true;
        }
    });
    $('#gender-select').click(function () {

        if ($('#gender-select').val() === "") {
            successGender = false;
            $("#output_checkuser4").text('Vous devez choisir un genre.');
            $("#output_checkuser4").css("color", "red");
            $("#output_checkuser4").css("margin", "-15px 0 5px 0");
        } else {
            successGender = true;
            $("#output_checkuser4").text("");
        }

    });


    $('#country').keyup(function () {

        if ($('#country').val().length < 3 || $('#country').val().length > 16) {
            successCountry = false;
            $("#output_checkuser5").text('le nom de la ville doit être entre 3 et 16 caractères');
            $("#output_checkuser5").css("color", "red");
            $("#output_checkuser5").css("margin", "-15px 0 5px 0");
        }
        if ($('#country').val().length >= 3) {
            countryAutocompl();
            successCountry = true;
            $("#output_checkuser5").text("");
        }

    });


    $('#email').keyup(function () {

        if (!emailRegex.test($('#email').val())) {
            emailsuccess = false;
            $("#output_checkuser6").text('Email invalide.');
            $("#output_checkuser6").css("color", "red");
            $("#output_checkuser6").css("margin", "-15px 0 5px 0");
        } else {
            emailsuccess = true;
            $("#output_checkuser6").text("");
        }

    });


    $('#mdp').keyup(function () {
        if (!passwordRegex.test($('#mdp').val())) {
            successMdp = false;
            $("#output_checkuser7").text('Le mot de pass doit être d\'une longueur ente 6 et 12 contenir un symbole, une majuscule et un chiffre.');
            $("#output_checkuser7").css("color", "red");
            $("#output_checkuser7").css("margin", "-15px 0 5px 0");
        } else {
            successMdp = true;
            $("#output_checkuser7").text("");
        }
    });


    $("#envoyer").on('click', function () {
        if (successName && successPrenom && successGender && successCountry && emailsuccess && successMdp) {
            sendAjaxInscription();
        }

    });

    //  AUTOCOMPLETION //


    function countryAutocompl() {
        $.ajax({

            type: "POST",
            url: "controllers/autocompl.php",
            data:
                {
                    autocompl: $('#country').val()
                },

            success: function (data) {
                tableauTest = JSON.parse(data)
                console.log(tableauTest);
            }


        });


        $("#country").autocomplete({
            source: tableauTest
        });


    }


    function sendAjaxInscription() {
        $.ajax({
            type: "POST",
            url: "controllers/verify.php",
            dataType: "text",
            data: {
                inscription: '1',
                check_name: $('#name').val(),
                check_prenom: $('#secondName').val(),
                check_birthday: $('#birthday').val(),
                check_gender: $('#gender-select').val(),
                check_country: $('#country').val(),
                check_email: $('#email').val(),
                check_mdp: $('#mdp').val(),
                check_loisir: $('#loisir').val()
            },
            success: function(data) {
                console.log("okrequest");
                if (data === "nameSizeFalse" || data === "nameSizeFalse1") {

                    if (data === "nameSizeFalse") {
                        $("#output_checkuser").text('Le nom doit comporter entre 3 et 16 caractères !');
                        $("#output_checkuser").css("color", "red");
                        $("#output_checkuser").css("margin", "-15px 0 5px 0");
                    } else {
                        $("#output_checkuser").text('Le premier caractère doit être une lettre !');
                        $("#output_checkuser").css("color", "red");
                        $("#output_checkuser").css("margin", "-15px 0 5px 0");
                    }

                }else if (data === 'new user'){
                    console.log('test6')
                    window.alert('vous êtes maintenant inscrit, bienvenue sur le site !')
                }

            },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus);
            }
        });
    }
});