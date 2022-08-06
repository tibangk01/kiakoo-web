<section id="pagis" class="hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<p>
					<a href="/">Accueil</a><i class="fa fa-angle-right"></i>
					<a href="{{ route('taxonomy.show', $taxonomyId ) }}">{{ $taxonomyName }}</a><i class="fa fa-angle-right"></i>
					<a class="active" href="{{ route('taxon.show',$taxonId ) }}">{{ $taxonName }}</a>
				</p>
			</div>
		</div>
	</div>
</section>
