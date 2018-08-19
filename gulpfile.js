
var elixir = require('laravel-elixir');

elixir.config.sourceMap = false;

var gulp = require('gulp');

elixir(function (mix) {

    //conbile sass

    mix.sass('resources/assets/sass/app.scss','resources/assets/css' );



    //combine all the css file to all.css
    mix.styles(

        [
             'css/app.css',

            'bower/vendor/slick-carousel/slick/slick.css'


        ],
        //output
        'public/css/all.css'
        ,
        'resources/assets'); //where to look meaning the folder all the css files


  var bowerPath = 'bower/vendor';

  //combine all js together
  mix.scripts(

      [
        //JQuery
        bowerPath + '/jQuery/dist/jquery.min.js',

        //Foundation-site
        bowerPath + '/foundation-sites/dist/js/foundation.min.js',

      // slick-carouseL
          bowerPath + '/slick-carousel/slick/slick.min.js'


      ],
      //output this here
      'public/js/all.js',

      'resources/assets'

  );

})


