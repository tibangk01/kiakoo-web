<div wire:ignore.self id="editCommentModal" class="modal form-modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" style="margin-bottom: 0;">Edition du commentaire<button type="button" class="close"
                        data-dismiss="modal"><img src="{{ asset('kiakoo/images/icon-close.png') }}" alt="" /></button>
                </h4>

            </div>

            <div class="modal-body">

                <form wire:submit.prevent="edit">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-xs-12">

                                <p>
                                    <span class="star-bis">
                                        <a class="fa {{ $star >= 1 ? 'fa-star': 'fa-star-o' }}" href="#" wire:click.prevent="oneStar"></a>
                                        <a class="fa {{ $star >= 2 ? 'fa-star': 'fa-star-o' }}" href="#" wire:click.prevent="twoStars"></a>
                                        <a class="fa {{ $star >= 3 ? 'fa-star': 'fa-star-o' }}" href="#" wire:click.prevent="threeStars"></a>
                                        <a class="fa {{ $star >= 4 ? 'fa-star': 'fa-star-o' }}" href="#" wire:click.prevent="fourStars"></a>
                                        <a class="fa {{ $star >= 5 ? 'fa-star': 'fa-star-o' }}" href="#" wire:click.prevent="fiveStars"></a>
                                    </span>
                                </p>

                                <input type="hidden" wire:model="star" value="{{ $star }}">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-xs-12">

                                <textarea wire:model.lazy="comment" placeholder="Merci de laisser votre commentaire ici">{{ $comment}}</textarea>

                                @error('comment')

                                    <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 text-center col-sm-12 col-xs-12">

                                <input class="submit" type="submit" value="Commenter" />

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

