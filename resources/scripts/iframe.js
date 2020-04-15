// // Inject YouTube API script
// var tag = document.createElement('script');
// tag.src = "//www.youtube.com/player_api";
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// var player;

// function onYouTubePlayerAPIReady() {
//   // create the global player from the specific iframe (#video)
//   player = new YT.Player('video', {
//     events: {
//       // call this function when player is ready to use
//       'onReady': onPlayerReady
//     }
//   });
// }

// function onPlayerReady(event) {

//   // bind events
//   var playButton = document.getElementById("play-button");
//   playButton.addEventListener("click", function() {
//     player.playVideo();
//   });

//   var pauseButton = document.getElementById("pause-button");
//   pauseButton.addEventListener("click", function() {
//     player.pauseVideo();
//   });

// }

const playButtons = document.querySelectorAll('.video__play');

playButtons.forEach(button => {
  button.addEventListener('click', (e) => {
    e.preventDefault();

    e.srcElement.classList.add('hidden');

    console.log('hi');

    const iframe = e.srcElement.previousElementSibling;

    iframe.src += "&autoplay=1";
  })
});
