<x-layout>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @forelse ($contentData as $singleData)
                    @if ($singleData->type == 'image')
                    <img src="{{ $singleData->value }}" alt="">
                    @elseif ($singleData->type == 'title')
                    <h1>{{ $singleData->value }}></h1>
                    @elseif ($singleData->type == 'subtitle')
                    <h2>{{ $singleData->value }}></h2>
                    @elseif ($singleData->type == 'excerpt')
                    <p>{{ $singleData->value }}></p>
                    @endif
                @empty
                    <h4>Nothing Parsed</h4>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>