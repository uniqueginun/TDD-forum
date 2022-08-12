<div
    class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5> <a href="{{ route('articles.show', $article) }}" class="text-primary">{{ $article->title }}</a></h5>
            <p class="text-sm">
                <span class="op-6">Posted {{ $article->created_at->diffForHumans() }} by {{ $article->creator->name }}</span> 
            </p>
            @if ($details)
            <p>{{ $article->body }}</p>
            @endif
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2"
                    href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a></div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">141
                        Votes</span></div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span
                        class="d-block text-sm">122 Replys</span></div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290
                        Views</span></div>
            </div>
        </div>
    </div>
</div>
