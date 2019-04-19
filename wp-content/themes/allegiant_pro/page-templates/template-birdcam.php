<?php /* Template Name: Birdcam */ ?>
<?php get_header(); ?>


<style>
	iframe#player {
		position: relative;
		margin-top: -201px;
		width: 100vw;
		display: block;
		height: 100vh;
	}
</style>


<script src="https://www.youtube.com/iframe_api"></script>

<script>
	const DEFAULT_ID = "UjALrXRNzGE";

	const id = location.search.split("?id=")[1] || DEFAULT_ID;
	let player = null;

	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			videoId: id,
			playerVars: {
				'autoplay': 1, 
				'controls': 0,
				'mute': 1,
			},
			events: {
				'onReady': onPlayerReady
			}
        });
	}

	function onPlayerReady() {
		player.playVideo();
	}

</script>



<div id="player"></div>




<?php get_footer(); ?>


<!--

    What needs to be done. So when user clicks on the video, they are taken to another page
 -->