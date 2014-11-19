<html>
    <head>
        <title>Player</title>
        <script type="text/javascript" src="audio-player/audio-player.js"></script>
        <script type="text/javascript">
            AudioPlayer.setup("audio-player/player.swf", {
                width: 290
            });
        </script>
    </head>
    <body>
        <p id="audioplayer_1">Alternative content</p>
        <script type="text/javascript">
            AudioPlayer.embed("audioplayer_1", {soundFile: "music/test.mp3"});
        </script>

        <p id="audioplayer_2">Alternative content</p>
        <script type="text/javascript">
            AudioPlayer.embed("audioplayer_2", {soundFile: "music/test1.mp3"});
        </script>
    </body>
</html>
