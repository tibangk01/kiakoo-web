<div id="addAddressModal" class="modal form-modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Adresses de livraison <button type="button" class="close"
                        data-dismiss="modal"><img src="{{ asset('kiakoo/images/icon-close.png') }}" alt="img" /></button>
                </h4>

            </div>

            <div class="modal-body">

                {!! Form::open(['method' => 'POST', 'route' => 'delivery-address.store', 'id' => 'add_address_form']) !!}

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-xs-12" style="text-align: center; color:red; margin:5px;">
                            <span class="server_error"></span>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <label>Téléphone(sans indicatifs)<span>*</span></label>

                            {!! Form::text('phone_number', $phoneNumber, ['placeholder' => 'Ex: 90909090, 95959595, ...']) !!}

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                                <span class="error-text phone_number_error"></span>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <label>Quartier<span>*</span></label>

                            {{-- //TODO: select 2 --}}
                            {!! Form::select('district_id', $districts, null, ['id' => 'district_id', 'placeholder' => 'Sélectionner un quartier']) !!}

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                                <span class="error-text district_id_error"></span>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <label>Adresse<span>*</span></label>

                            {!! Form::textarea('address',null, ['placeholder' => 'Ex: Adidogomé, Rue des freres franciscains']) !!}

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                                <span class="error-text address_error"></span>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                            <input class="submit" type="submit" value="Enregister" />
                        </div>

                    </div>

                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>
