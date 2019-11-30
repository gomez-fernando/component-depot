

        var averageRating = averageRating;
        var userId = userId;
        var id = 'stars-' + componentId;
        var urlRatingStore = urlRatingStore;



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
                }).done(function(response) {
                    console.log(response)
                });


            }
        });


        $control.barrating('set' , averageRating);



