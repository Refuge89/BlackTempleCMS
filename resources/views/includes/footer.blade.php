<div id="footer">
    <div class="container row">
        <div class="one-third">
            <img class="footicon" src="{{ Config::get('app.url') }}images/icon.png"><h3>More <span>Links</span></h3>
            <a href="#">About</a>
            <a href="#">Database</a>
            <a href="#">Support</a>
        </div>
        <div class="one-third">
            <img class="footicon" src="{{ Config::get('app.url') }}images/icon.png"><h3>Get In <span>Touch</span></h3>

            <a href="#">Contact Us</a>
            <a href="https://discord.gg/0104mrsWurLjNSZB6">Discord</a>
            <a href="http://forums.black-temple.org">Forum</a>

        </div>
        <div class="one-third about">
            <img class="footicon" src="{{ Config::get('app.url') }}images/icon.png"><h3>About <span>Black Temple</span></h3>
            <p>The Black Temple project brings together many people with a high level of experience working together to create and deliver the best
                blizzlike experiences for players. Many of the developers being old players and veterans in the WoW emulation scene, they dedicate their time for the players
                and the community.</p>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="container">
        <p>COPYRIGHT <span>BLACK TEMPLE</span> &copy; 2016</p>
        <p class="credits">DESIGN BY <a href="http://zafire.me" target="_blank">ZAFIRE</a><span>.ME</span></p>
    </div>
</div>
@yield('bottomjs')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80270011-1', 'auto');
    ga('send', 'pageview');

</script>
<script type="text/javascript" src="http://cdn.openwow.com/api/tooltip.js"></script>