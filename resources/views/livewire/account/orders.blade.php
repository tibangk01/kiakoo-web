<div id="tab-1" class="tab-pane fade in active">

    <div class="col-lg-12 col-sm-12 col-xs-12">

        <h2>Mes  commandes<br/> <span>{{ $orders->count() }} Commandes</span></h2>

    </div>

    <div class="col-lg-5 col-sm-6 col-xs-10">

        <input type="text" placeholder="Rechercher par ID, produit" wire:model="searchTerm" />

    </div>

    <div class="col-lg-5 visible-xs flush-left text-center col-sm-12 col-xs-2">
        <a class="filter-btn" data-toggle="modal" data-target="#myModal"><img src="images/icon-filter.png" alt="" /></a>
    </div>

    <div class="col-lg-5 hidden-xs text-right pull-right col-sm-4 col-xs-12">
        <select class="filt">
            <option>Filtrer par statut</option>
            <option>Filtrer par statut</option>
            <option>Filtrer par statut</option>
        </select>
    </div>

    <div class="col-lg-12 col-sm-12 col-xs-12">

        <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">

            <thead class="thead-dark">

                <tr>
                    <th>ID </th>
                    <th>Date</th>
                    <th>État</th>
                    <th>Produit</th>
                    <th>Montant</th>
                    <th>&nbsp;</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($orders as $order)

                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->translatedFormat('jS F Y') }}</td>

                        <td><div class="label">{{ $order->status->name }}</div></td>
                        <td>{{ Str::limit($order->variations->first()->name, 20, ' ...') }} <span>{{ $order->variations->count() > 1 ? '+ '.($order->variations->count() - 1 ).' de plus' : null }}</span></td>
                        <td>{{ format_price($order->total_final) }} F</td>
                        <td><a class="vor" href="{{ route('order.show', $order) }}">Voir plus</a></td>
                    </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center">Pas encore de commandes</td>
                </tr>

                @endforelse

          </tbody>

       </table>

    </div>

    @if ($orders->isNotEmpty())

        <div class="col-lg-12 text-center pagi flush col-sm-12 col-xs-12">
            <ul>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Suivant</a></li>
                <li><a class="lt" href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>

    @endif

</div>
