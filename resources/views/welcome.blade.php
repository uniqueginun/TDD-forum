<x-base>
    @foreach ($articles as $article)
        <x-article :article="$article" />
    @endforeach
</x-base>
