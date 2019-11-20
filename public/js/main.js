// var url = 'https://lara-gram.000webhostapp.com';
var url = 'http://component-depot-personal.test';

window.addEventListener('load', function(){

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    // boton de like
    function like(){
        $('.btn-like').unbind('click').click(function(){
            console.log('like');

            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/img/facebook-like-64-blue.png');

            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if (response.like){
                        console.log('has dado like a la publicacion');
                    } else {
                        console.log('error al dar like');
                    }

                }
            });

            dislike();
        });
    }
    like();

        // boton de dislike
    function dislike(){
        $('.btn-dislike').unbind('click').click(function(){
            console.log('dislike');

            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'/img/facebook-like-64-gray.png');

            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if (response.like){
                        console.log('has dado dislike a la publicacion');
                    } else {
                        console.log('error al dar dislike');
                    }

                }
            });

            like();
        });
    }
    dislike();

    // BUSCADOR
    $('#buscador').submit(function(e){
        // alert('ey');
        // e.preventDefault();
        $(this).attr('action',url+'/gente/'+$('#buscador #search').val());
        // $(this).submit();
    });

      // Back to top button
    $(window).scroll(function() {

        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }

    });

    $('.back-to-top').click(function(){
        $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
        return false;
    });
});
