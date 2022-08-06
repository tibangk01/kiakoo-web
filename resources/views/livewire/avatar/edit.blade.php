<div wire:ignore.self class="modal form-modal fade" id="edit-avatar" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Modification de l'avatar <button type="button" class="close"
                        data-dismiss="modal"><img src="{{ asset('kiakoo/images/icon-close.png') }}" alt="img" /></button>
                </h4>

            </div>

            <div class="modal-body">


                <form wire:submit.prevent="edit">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-6 col-sm-12 col-xs-12 text-center" style="padding: 0 0 20px 0">

                            <img width="100" height="100" src= "{{ auth()->user()->getMedia('avatar')->first() ?  auth()->user()->getMedia('avatar')->first()->getUrl('thumb') : ''}}" alt="avatar">

                        </div>

                        <div class="col-lg-6 col-sm-12 col-xs-12 text-center" style="padding: 0 0 20px 0">

                            <div id="preview"></div>

                        </div>

                    </div>

                    <div class="row">

                        <input type="file" wire:model="avatar" id="file-input">

                        @error('avatar')

                            {{-- //TODO: refactor this code --}}
                            <p class="text-danger" style="padding: 5px 20px">{{ $message }}</p>

                        @enderror

                    </div>

                    <div class="row">

                        <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                            <input class="submit" type="submit" value="Enregister" />
                        </div>

                    </div>

                </div>

                </form>

            </div>

        </div>

    </div>

</div>
