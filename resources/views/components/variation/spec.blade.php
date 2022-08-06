<div class="col-lg-12 bg col-sm-12 col-xs-12">

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
        <h2>Fiche technique <i class="fa fa-angle-down"></i></h2>
    </div>

    <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">
        <a id="btn-2">
            <h2>Fiche technique <i class="fa fa-angle-down"></i></h2>
        </a>
    </div>

    <div id="div-acor-2" class="col-lg-12 flush col-sm-12 col-xs-12">

        <div class="col-lg-6 col-sm-6 col-xs-12">

            <table class="table">

                <thead>
                    <tr>
                        <th colspan="2">Principales caractéristiques</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($datas as $propertyValue)

                        @if ($propertyValue->property->is_technical == false)

                            <tr>
                                <td>{{ $propertyValue->property->name }}</td>
                                <td>{{ $propertyValue->name }}</td>
                            </tr>

                        @endif

                    @empty

                        <tr>
                            <td colspan="2">Pas d'enregistrements</td>
                        </tr>

                    @endforelse

                </tbody>

            </table>


        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">

            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Descriptif technique</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($datas as $propertyValue)

                        @if ($propertyValue->property->is_technical == true)

                            <tr>
                                <td>{{ $propertyValue->property->name }}</td>
                                <td>{{ $propertyValue->name }}</td>
                            </tr>

                        @endif

                    @empty

                        <tr>
                            <td colspan="2">Pas d'enregistrements</td>
                        </tr>

                    @endforelse

                </tbody>
                
            </table>

        </div>

    </div>

</div>
