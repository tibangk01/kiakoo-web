<div>

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">

        <h4>5 Étoiles
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ stars_percentage($totalCount, $fiveCount) }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ stars_percentage($totalCount, $fiveCount) }}%">
                    <span class="sr-only">{{ stars_percentage($totalCount, $fiveCount) }}% Complete</span>
                </div>
            </div>
            <span>{{ $fiveCount }}</span>
        </h4>
    </div>

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
        <h4>4 Étoiles
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ stars_percentage($totalCount, $fourCount) }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ stars_percentage($totalCount, $fourCount) }}%">
                    <span class="sr-only">{{ stars_percentage($totalCount, $fourCount) }}% Complete</span>
                </div>
            </div>
            <span>{{ $fourCount }}</span>
        </h4>
    </div>

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
        <h4>3 Étoiles
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ stars_percentage($totalCount, $threeCount) }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ stars_percentage($totalCount, $threeCount) }}%">
                    <span class="sr-only">{{ stars_percentage($totalCount, $threeCount) }}% Complete</span>
                </div>
            </div>
            <span>{{ $threeCount }}</span>
        </h4>
    </div>

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
        <h4>2 Étoiles
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ stars_percentage($totalCount, $twoCount) }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ stars_percentage($totalCount, $twoCount) }}%">
                    <span class="sr-only">{{ stars_percentage($totalCount, $twoCount) }}% Complete</span>
                </div>
            </div>
            <span>{{ $twoCount }}</span>
        </h4>
    </div>

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
        <h4>1 Étoiles
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ stars_percentage($totalCount, $oneCount) }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ stars_percentage($totalCount, $oneCount) }}%">
                    <span class="sr-only">{{ stars_percentage($totalCount, $oneCount) }}% Complete</span>
                </div>
            </div>
            <span>{{ $oneCount }}</span>
        </h4>
    </div>
    
</div>
