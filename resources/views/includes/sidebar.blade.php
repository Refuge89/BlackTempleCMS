<?php use App\Libraries\CMSHelper; ?>

<div id="right-content">
    <img class="newsicon" src="{{ Config::get('app.url') }}images/icon.png"><h2>OUR<span> SERVER</span></h2>
    <div id="status">
        <p>Netherstorm<br/><span id="rates">1x</span><span> Blizzlike</span></p><img src="{{ Config::get('app.url') }}images/bc_icon.png">
        {{ CMSHelper::getServerStatus() }}<br/><span id="players">{{ CMSHelper::getOnlinePlayers() }} Players</span></p>
    </div>

    <p id="realm-info"><span>Netherstorm</span> is a progressive x1 blizzlike PvE realm focusing on creating a
        superior experience during The Burning Crusade for everyone looking to relive the expansion.</p>

    <p class="tag">
        <span>1x Experience</span>
        <span>Progressive</span>
        <span>Blizzlike</span>

        <span>PvE Mode</span>
        <span>2.4.3</span>
        <span>1-70</span>
    </p>
    <img class="trailericon" src="{{ Config::get('app.url') }}images/icon.png"><h2>LATEST<span> TRAILER</span></h2>
    <div id ="trailervid">
        <video controls style="width:100%">
            <source src="{{ Config::get('app.url') }}videos/2fa.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>