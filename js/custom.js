const image = [];
image['Rain']='icon-13.svg';
image['Haze']='icon-1.svg';
image['Clouds']='icon-5.svg';
image['Thunder']='icon-12.svg';
image['Sunny']='icon-3.svg';
image['Snow']='icon-14.svg';

// 'Rain':'icon-13.svg','Haze':'icon-1.svg','Clouds':'icon-5.svg','Thunder':'icon-12.svg','sunny':'icon-3.svg','snow':'icon-14.svg'


  getData();

  function getData () {
    $(".loader").delay(2000).fadeIn("slow");

      var search = $('#search-weather').val();
      if(search == undefined || search == '' ){
        search = 'Mumbai';
      }
      $.ajax({
          url:"controller/WeatherController.php",    //the page containing php script
          type: "POST",    //request type,
          dataType: 'json',
          data: {'search':search},
          success:function(result){
            $(".overlayer").delay(2000).fadeOut("slow");
            $(".loader").delay(2000).fadeOut("slow");
              if(result.status == 1){
                var data = result.data;
                var current_date = new Date();
                var dd = current_date.getDate()+' '+current_date.toLocaleDateString(undefined, { month: 'short'});
                var options = { weekday: 'long' };
                var day = current_date. toLocaleDateString('en-US', options);
                var temp = (data.current.temp).toFixed()+'<sup>o</sup>C';
                $('.location').html(capitalizeFirstLetter(search));
                $('.num').html(temp);
                $('.date').html(dd);
                $('.day').html(day);
                $('.wind_speed').html(data.current.wind_speed+'km/h');
                $('.weather').html(data.current.weather[0].main);
                var forecast_img = 'images/icons/'+image[data.current.weather[0].main];
                $('#forecast_img').attr("src",forecast_img);
                $('.visibility').html(data.current.visibility/1000+'km');
                $('.humidity').html(data.current.humidity+'%');

                for (var i = 0; i < data.daily.length; i++) {
                  var ndate = new Date(data.daily[i].dt * 1000);
                  var ndd = current_date.getDate()+' '+ndate.toLocaleDateString(undefined, { month: 'short'});
                  var nday = ndate. toLocaleDateString('en-US', options);
                  var ntemp = (data.daily[i].temp.day).toFixed()+'<sup>o</sup>C';
                  var ntemprange = (data.daily[i].temp.min).toFixed()+'<sup>o</sup>C'+'/'+(data.daily[i].temp.max).toFixed()+'<sup>o</sup>C';
                  var forecast_imgs = 'images/icons/'+image[data.daily[i].weather[0].main];
                  $('.day'+i).html(nday);
                  $('.degree'+i).html(ntemp);
                  $('.TempHL'+i).html(ntemprange);
                  $('#forecast_img'+i).attr("src",forecast_imgs);
                  $('.weather_status'+i).html(data.daily[i].weather[0].main);
                }
              }else{
                $("#weather-msg").show();
                $("#weather-msg").text(result.msg).css('color', 'red');
                setTimeout(function(){
                    $("#weather-msg").text('');
                }, 5000);
              }
          }
      });
  }
  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
