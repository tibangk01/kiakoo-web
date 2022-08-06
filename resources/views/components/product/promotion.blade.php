<div class="col-lg-12 text-center col-sm-12 col-xs-12">
    <div class="col-lg-12 depc flush col-sm-12 col-xs-12">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <h3>Dépêchez-vous ! Il n'en reste que {{ $datas['quantities']['left'] }}</h3>
        </div>

        <x-product.promotion.progress :datas="$datas"/>

        <div class="col-lg-3 text-center col-sm-3 col-xs-3">
            <p id="days"></p>
        </div>
        <div class="col-lg-3 text-center col-sm-3 col-xs-3">
            <p id="hours"></p>
        </div>
        <div class="col-lg-3 text-center col-sm-3 col-xs-3">
            <p id="minutes"></p>
        </div>
        <div class="col-lg-3 text-center col-sm-3 col-xs-3">
            <p id="seconds"></p>
        </div>
    </div>
</div>

@php
    $expiresAt = $datas['dates']['expiresAt'];
@endphp

<script>
    //TODO: get countdown date
    var countDownDate = new Date("{{ $expiresAt }}").getTime();

    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("seconds").innerHTML = seconds + "<br/><span> Secondes </span>";
        document.getElementById("minutes").innerHTML = minutes + "<br/><span> Minutes </span>";
        document.getElementById("hours").innerHTML = hours + "<br/><span> Heures </span>";
        document.getElementById("days").innerHTML = days + "<br/><span> Jours </span>";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "";
        }

    }, 1000);
</script>
