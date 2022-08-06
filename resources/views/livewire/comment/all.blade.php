<div>

    @forelse ($comments as $comment)
        <div class="col-lg-12 col-sm-12 col-xs-12">

            @php
                $el = $comment->commentable->ratings->where('model_id', $comment->user_id)->first();
                $ratingValue = (int) $el->value;
            @endphp

            <span class="star">
                <a class="fa {{ $ratingValue >= 1 ? 'fa-star' : 'fa-star-o' }}"></a>
                <a class="fa {{ $ratingValue >= 2 ? 'fa-star' : 'fa-star-o' }}"></a>
                <a class="fa {{ $ratingValue >= 3 ? 'fa-star' : 'fa-star-o' }}"></a>
                <a class="fa {{ $ratingValue >= 4 ? 'fa-star' : 'fa-star-o' }}"></a>
                <a class="fa {{ $ratingValue >= 5 ? 'fa-star' : 'fa-star-o' }}"></a>
            </span>

            <p>{{ $comment->comment }}</p>

            <h4>{{ $comment->updated_at->format('d/m/Y H:i:s') }}<span>|</span>Par
                {{ $comment->commentator->customer->human->first_name }}

                @if (Auth::id() === $comment->user_id)

                    <span>|</span><livewire:comment.button-edit/>

                    <livewire:comment.form.edit :commentId="$comment->id" :ratingId="$el->id"
                        :variationId="$comment->commentable->id" />

                @endif

            </h4>

            <h5>

                <livewire:comment.like :commentId="$comment->id" key="{{ 'purchase_'. now().'_'.$comment->id }}"/>

                <livewire:comment.dislike :commentId="$comment->id" key="{{ 'purchase_'. now().'_'.($comment->id + 1) }}" />

            </h5>

        </div>

    @empty

        <div class="col-lg-12 col-sm-12 col-xs-12">

            <span>Pas encore de commentaire pour cet article.</span>

        </div>
    @endforelse

</div>
