@php
$total = $datas['quantities']['quantity'] + $datas['quantities']['quantity_used'];
$left = $datas['quantities']['quantity'];
@endphp

<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="progress">
        <div id="progress" class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

<script>
    var total = {{ $total }}
    var left = {{ $left }}

    var x = Math.ceil(left * 100 / total)

    var progress = document.getElementById('progress');
    progress.setAttribute('style', 'width:' + x + '%');
</script>
