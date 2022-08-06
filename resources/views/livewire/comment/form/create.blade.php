<div>

    @if (session('comment_added'))
        <div class="col-lg-12 col-sm-12 col-xs-12">

            <div class="alert alert-info alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                Votre commentaire a été bien enrgistré. Il sera publié incessemment après modération. Merci 😃
            </div>

        </div>
    @endif

    @if (session('commentUpdated'))
        <div class="col-lg-12 col-sm-12 col-xs-12">

            <div class="alert alert-info alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                Votre commentaire a été bien mis à jour. Il sera publié incessemment après modération. Merci 👊
            </div>

        </div>
    @endif

    @if (session('user_has_variation_comment'))
        <div class="col-lg-12 col-sm-12 col-xs-12 text-center">

            <div class="alert alert-warning alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                Il existe un commentaire pour cet article en votre nom.
                <br>
                Veillez-le modifier en cliquant <strong><livewire:comment.button-edit-bis/></strong>. Merci.
            </div>

        </div>
    @endif

    <div class="col-lg-12 col-sm-12 col-xs-12">

        <div class="comment-form">

            @if (session('not_auth'))
                <script type="text/javascript">
                    $('#loginModal').modal('show');
                </script>
            @endif

            <form wire:submit.prevent="store">

                {!! Form::hidden('variationId', $variationId) !!}

                <p>

                    <span class="star-bis">
                        <a class="fa {{ $star >= 1 ? 'fa-star' : 'fa-star-o' }}" href="#"
                            wire:click.prevent="oneStar"></a>
                        <a class="fa {{ $star >= 2 ? 'fa-star' : 'fa-star-o' }}" href="#"
                            wire:click.prevent="twoStars"></a>
                        <a class="fa {{ $star >= 3 ? 'fa-star' : 'fa-star-o' }}" href="#"
                            wire:click.prevent="threeStars"></a>
                        <a class="fa {{ $star >= 4 ? 'fa-star' : 'fa-star-o' }}" href="#"
                            wire:click.prevent="fourStars"></a>
                        <a class="fa {{ $star >= 5 ? 'fa-star' : 'fa-star-o' }}" href="#"
                            wire:click.prevent="fiveStars"></a>
                    </span>

                </p>

                <input type="hidden" wire:model="star" value="{{ $star }}">

                {{-- TODO: refactor input css classes --}}
                <textarea wire:model="comment" style="margin: 10px 0 0 0"
                    placeholder="Merci de laisser votre commentaire ici"></textarea>

                @error('comment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="submit" class="submit" style="margin-top: 18px;" value="Commenter">

            </form>

        </div>

    </div>

</div>
