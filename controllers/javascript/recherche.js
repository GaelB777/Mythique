$(document).ready(function () {

    $("#researchForm").on('click', function (e) {
        e.preventDefault();

        let gender = $("#gender-select").val();
        let country = $("#ville").val();

        $.ajax(
            {
                url: 'controllers/recherche.php',
                method: 'POST',
                data: {
                    genderPHP: gender,
                    countryPHP: country
                },
                success: function (data)
                {
                    $(".intern-slider").html('');
                    let returnedData = JSON.parse(data);

                            console.log(returnedData[0])

                    for (let k = 0; k < returnedData.length; k++) {
                        for(let i = 0; i < returnedData[k].length; i++)
                        {
                            let info1 = returnedData[k][i][1];
                            let info2 = returnedData[k][i][2];
                            let info3 = returnedData[k][i][3];
                            let info4 = returnedData[k][i][4];
                            let info5 = returnedData[k][i][5];
                            let info7 = returnedData[k][i][7];
                            let info8 = returnedData[k][i][8];

                            let birthday = new Date(info8);
                            const age =new Number((new Date().getTime() - birthday.getTime()) / 31536000000).toFixed(0);


                            if(i === 0)
                            {
                                $(document).ready(function(){
                                    $(".intern-slider").append("<div class='active'></div>");


                                    $(".active").append(
                                        "<p>Nom :  " + info1 + "</p>", "<p>Prénom : " + info2  + "<br />", "<p> Genre : " + info3 + "<p> Ville : " + info4  +
                                        "<p> Email : " + info5 + "<br />" + "<p> Loisir : " + info7 + "<br />" + "<p> age :  " + age + ' ans');
                                });
                            }else if(i > 0)
                            {
                                $(document).ready(function(){
                                    $(".intern-slider").append("<div class='nonActive"+i+"'></div>");
                                    $('.nonActive'+i).append("<p>Nom :  " + info1 + "</p>",
                                        "<p>Prénom : " + info2 + "<br />", "<p> Genre : " + info3 + "<br />", "<p> Ville : " +
                                        info4 + "<br />", "<p> Email : " + info5 + "<br />", "<p> Loisir : " + info7 + "<br />", "<p> age :  " + age + ' ans');
                                });
                            }
                        }
                    }
                }
            });
    });






$('.next').on('click', function(){
    let currentDiv = $('.active');
    let nextDiv = currentDiv.next();

    if(nextDiv.length)
    {
        currentDiv.removeClass('active').addClass('nonActive').css('z-index', -10);
        nextDiv.addClass('active').css('z-index', 10);
    }
});

    $('.prev').on('click', function(){
        let currentDiv = $('.active');
        let prevDiv = currentDiv.prev();

        if(prevDiv.length)
        {
            currentDiv.removeClass('active').addClass('nonActive').css('z-index', -10);
            prevDiv.addClass('active').css('z-index', 10);
        }
    });




});