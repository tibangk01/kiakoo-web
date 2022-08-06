    <!-- Trigger the modal with a button
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-form-home-3">Open Modal</button>-->
    <!-- Modal -->
    <div id="myModal-form-home-3" class="modal form-modal home-models fade" role="dialog">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><a href="#">Nouveau mot de passe</a> <button type="button"
                            class="close" data-dismiss="modal"><img
                                src="{{ asset('kiakoo/images/icon-close.png') }}" alt="" /></button></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <label>Nouveau mot de passe<span>*</span></label>
                            <input type="text" placeholder="" />
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <label>Confirmer le mot de passe<span>*</span></label>
                            <input type="text" placeholder="" />
                        </div>
                        <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                            <input class="submit" type="submit" value="Valider" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
