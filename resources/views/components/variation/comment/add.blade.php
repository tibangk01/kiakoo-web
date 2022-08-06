<div>

    @if (session('comment_added'))
        <div class="col-lg-12 col-sm-12 col-xs-12">

            <div class="alert alert-info alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                Votre commentaire a été bien enrgistrée. Il sera publié incessemment après modération. Merci 😃
            </div>

        </div>
    @endif

    @if (session('user_has_variation_comment'))
        <div class="col-lg-12 col-sm-12 col-xs-12">

            <div class="alert alert-warning alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                Existe deja
            </div>

        </div>
    @endif

    <div class="col-lg-12 col-sm-12 col-xs-12">

        <livewire:comment.form.create :variationId="$variation->id" />

    </div>

    <div class="col-lg-12 col-sm-12 col-xs-12">
        <hr />
    </div>

</div>
