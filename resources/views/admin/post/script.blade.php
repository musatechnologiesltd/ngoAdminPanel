<script>
    $("[id^=nothiSearchFdth]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fdThree'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFdth"+result).html(data);
                }
                });



    });

    </script>


<script>
    $("[id^=nothiSearchFctw]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fcTwo'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFctw"+result).html(data);
                }
                });



    });

    </script>




<script>
    $("[id^=nothiSearchFcon]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fcOne'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFcon"+result).html(data);
                }
                });



    });

    </script>


<script>
    $("[id^=nothiSearchFdse]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fdSeven'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFdse"+result).html(data);
                }
                });



    });

    </script>


<script>
    $("[id^=nothiSearchFdsi]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fdSix'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFdsi"+result).html(data);
                }
                });



    });

    </script>



<script>
    $("[id^=nothiSearchFdno]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fdNineOne'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFdno"+result).html(data);
                }
                });



    });

    </script>


<script>
    $("[id^=nothiSearchFdni]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'fdNine'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultFdni"+result).html(data);
                }
                });



    });

    </script>


<script>
    $("[id^=nothiSearchRene]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'renew'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultRene"+result).html(data);
                }
                });



    });

    </script>



<script>
$("[id^=nothiSearchName]").keyup(function(){


            var main_id = $(this).attr('id');
            var result = main_id.slice(15);
            var main_value = $(this).val();


            var status = 'nameChange'

            //alert(result);



            $.ajax({
            url: "{{ route('searchResultForDak') }}",
            method: 'GET',
            data: {main_value:main_value,result:result,status:status},
            success: function(data) {

                 $("#nothiSearchResultName"+result).html(data);
            }
            });



});

</script>



<script>
    $("[id^=nothiSearchRegi]").keyup(function(){


                var main_id = $(this).attr('id');
                var result = main_id.slice(15);
                var main_value = $(this).val();


                var status = 'registration'

                //alert(result);



                $.ajax({
                url: "{{ route('searchResultForDak') }}",
                method: 'GET',
                data: {main_value:main_value,result:result,status:status},
                success: function(data) {

                     $("#nothiSearchResultRegi"+result).html(data);
                }
                });



    });

    </script>



