
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Player</title>
<meta http-equiv="refresh" content="1740">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdnbye@latest/dist/hlsjs-p2p-engine.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdnbye@latest/dist/clappr-plugin.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/clappr/clappr-level-selector-plugin@latest/dist/level-selector.min.js"></script>
<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||100|setTimeout'.split('|'),0,{}))
</script>
<script disable-devtool-auto src='https://fastly.jsdelivr.net/npm/disable-devtool@latest/disable-devtool.min.js'></script>
</head>
<div id="player"></div>
<script>
    var player = new Clappr.Player(
        {
            source: "http://lmil.live-s.cdn.bitgravity.com/cdn-live/_definst_/lmil/live/aajtak_app.smil/playlist.m3u8",
            parentId: "#player",
            autoPlay: true,
  		mute: true,
		width: '100%',
		height:'99.9%',
            plugins: [LevelSelector],
            levelSelectorConfig: {
                title: 'Quality',
                labels: {
                    1: 'High-720p', // 240kbps
                    0: 'Low-360p', // 120kbps
                }
              },
            playback: {
                hlsjsConfig: {
                    // Other hlsjsConfig options provided by hls.js
                    p2pConfig: {
                        logLevel: 'debug',
                        live: true,        // set to true in live mode
                        // Other p2pConfig options provided by CDNBye
                    }
                }
            },
                    mediacontrol: {
                        seekbar: '#ff0000',
                        buttons: '#58bcaf'
                    },
                    mimeType: "application/x-mpegURL"
        });

</script>
</html>