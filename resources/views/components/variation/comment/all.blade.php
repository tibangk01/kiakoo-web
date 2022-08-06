@forelse ($datas as $data)

<div class="col-lg-12 col-sm-12 col-xs-12">

    <span class="star">
        <a class="fa fa-star" href="#"></a>
        <a class="fa fa-star" href="#"></a>
        <a class="fa fa-star" href="#"></a>
        <a class="fa fa-star-half-o" href="#"></a>
        <a class="fa fa-star-o" href="#"></a>
    </span>

    <p>{{ $data['comment'] }}</p>

    <h4>{{ $data['updated_at']->format('d/m/Y') }}<span>|</span>Par {{ $data['first_name'] }}

        @if (Auth::id() == $data['user_id'])

            <span>|</span><a href="#" class="btn btn-sm btn-primary">Modifier</a></h4>

        @endif

    <h5>

        <span><i class="fa fa-thumbs-o-up"></i> 7</span>

        <span><i class="fa fa-thumbs-o-down"></i> 22</span>

    </h5>

</div>

@empty

    <div class="col-lg-12 col-sm-12 col-xs-12">

        <span>Pas encore de commentaire pour cet article.</span>

    </div>

@endforelse

