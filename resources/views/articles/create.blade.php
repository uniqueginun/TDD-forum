<x-base>
    <div
        class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="row align-items-center">
            <h4>Create new article</h4>
            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" />
                    @error('title')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                    @error('body')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-success mb-2">Publish Article</button>
                </div>
            </form>
        </div>
    </div>
</x-base>
