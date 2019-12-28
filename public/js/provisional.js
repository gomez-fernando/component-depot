// <script type="text/javascript">
//     let averageRating = parseInt('{{$averageRating}}');
// console.log(averageRating);
// $(document).ready(function () {
//     let $control = $('#stars').barrating({
//         theme: 'fontawesome-stars',
//         silent: false,
//         onSelect: function(value, text) {
//
//
//
//             let data = {
//                 user_id : '{{ Auth::user()->id}}',
//                 component_id : '{{ $component->id }}',
//                 value: value
//             }
//             let urlAjax =  '{{route('rating.store')}}';
//
//             console.log(urlAjax);
//
//             $.ajax({
//                 url:urlAjax,
//                 data:data,
//                 method: "POST",
//                 dataType: 'json',
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             }).done(function(response) {
//                 console.log(response)
//             });
//
//         }
//     });
//
//     $control.barrating('set' , averageRating);
//
//     $.ajax({url: "rating", success: function(result){
//             $("#div1").html(result);
//         }})
//
// });
//
// </script>
