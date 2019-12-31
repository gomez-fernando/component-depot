

        var averageRating = averageRating;
        var userId = userId;
        var id = 'stars-' + componentId;
        var urlRatingStore = urlRatingStore;
        if(rated == 0){
            var $control = drawStars(id,componentId,userId);
        } else{
            //console.log('rated:' + componentId);

            var $control = $('#'+id).barrating({
                theme: 'fontawesome-stars',
                silent: true,
                initialRating:null,
                readonly: true,
                emptyRatingValue : true,
            });
            // updateStarsAverage($control, value, readonly = true)
        }

        function drawStars(id,componentId,userId){
            //console.log('not rated:' + componentId);
            //console.log('userId:' + userId);
            var $control = $('#'+id).barrating({
                theme: 'fontawesome-stars',
                silent: true,
                initialRating:null,
                readonly: false,
                emptyRatingValue : true,
                onSelect: function(value, text) {
                    data = {
                        user_id: userId,
                        component_id: componentId,
                        value: value
                    }
                    urlAjax = urlRatingStore;

                    $.ajax({
                        url:urlAjax,
                        data:data,
                        method: "POST",
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function(response){
                        let value = parseInt(response.value);
                        updateStarsAverage($control,value,true);
                        printVotes(response.componentId, response.ratingsQuantity);
                    });


                }
            });

            return $control;
        }

        $control.barrating('set' , averageRating);
        // updateStarsAverage($control, averageRating)

        function updateStarsAverage($control, value, readonly = false) {
            $control.barrating('set' , value);
            $control.barrating('readonly', readonly);
        }

        function printVotes(componentId, ratingsQuantity) {
            if (ratingsQuantity == 1){
                valoraciones = ' valoración';
            } else {
                valoraciones = ' valoraciones';

            }
            $('#vote-' + componentId).empty();
            $('#vote-' + componentId).text(ratingsQuantity + valoraciones);
            $('#vote-'+response.componentId).text();
        }

