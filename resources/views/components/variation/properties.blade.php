@foreach ($datas as $data)

    @if ($data[0]['property_name'] == 'Couleur')

        <div class="col-lg-12 noir col-sm-12 col-xs-12">

            <h3>{{ $data[0]['property_name'] }} : <b>{{ $data[0]['property_value_name'] }}</b></h3>

            @foreach ($data[1] as $dat)

                <a class="rds {{ kiakoo_color($dat['property_value_name']) }} {{ $data[0]['property_value_id'] == $dat['property_value_id'] ? ' active' : '' }}"
                    href="{{ ($data[0]['property_value_id'] == $dat['property_value_id']) ? "#" : route('variation.show', ['variation' => $dat['variation_id'],'o' => $data[0]['variation_id'],'p' => $data[0]['property_id'],'pv' => $dat['property_value_id']]) }}"></a>

            @endforeach

        </div>

    @else

        <div class="col-lg-12 col-sm-12 col-xs-12">

            <h3>{{ $data[0]['property_name'] }} : <b>{{ $data[0]['property_value_name'] }}</b></h3>

            <p>

                @foreach ($data[1] as $dat)

                    <a class="sm-btn {{ $data[0]['property_value_id'] == $dat['property_value_id'] ? ' active' : '' }}"
                        href="{{
                        ($data[0]['property_value_id'] == $dat['property_value_id']) ? "#" : route('variation.show', ['variation' => $dat['variation_id'],'o' => $data[0]['variation_id'],'p' => $data[0]['property_id'],'pv' => $dat['property_value_id']]) }}">{{ $dat['property_value_name'] }}</a>

                @endforeach

            </p>

        </div>

    @endif

@endforeach
