$(document).ready(function(){

  $(".example").musicPlayer({
      playlistItemSelector: 'div',
      elements: ['artwork', 'information', 'controls', 'progress', 'time', 'volume'], // ==> This will display in  the order it is inserted
      //elements: [ 'controls' , 'information', 'artwork', 'progress', 'time', 'volume' ],
      //controlElements: ['backward', 'play', 'forward', 'stop'],
      //timeElements: ['current', 'duration'],
     //timeSeparator: " : ", // ==> Only used if two elements in timeElements option
      //infoElements: [  'title', 'artist' ],

      //volume: 10,
      autoPlay: true,
      //loop: true,
      //

      onLoad: function() {
          //Add Audio player
          plElem  = "<div class='pl'></div>";
          $('.example').find('.player').append(plElem);
          // show playlist
          $('.pl').click(function (e) {
              e.preventDefault();

              $('.example').find('.playlist').toggleClass("hidden");
          });
      },

      onPlay: function() {
         $('body').css('background', '#003366');
      },
      onPause: function() {
          $('body').css('background', 'black');
      },
      onStop: function() {
          $('body').css('background', 'black');
      },
      onFwd: function() {
          $('body').css('background', '#003366');
      },
      onRew: function() {
          $('body').css('background', '#003366');
      },
      volumeChanged: function() {
          $('body').css('background', 'black');
      },
      seeked: function() {
         $('body').css('background', '#003366');
      },
      trackClicked: function() {
         $('body').css('background', 'black');
      },
      onMute: function() {
         $('body').css('background', 'grey');
      },


  });

});
