<x-layout>
    <div class="col-12">
        <div class="card">
            <div class="card-header">All Pockets</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($pockets as $pocket)
                    <li class="list-group-item">
                        {{ $loop->index+1 }}. {{ $pocket->title }}
                        <ul class="list-group">
                            @foreach ($pocket->contents as $content)
                            <li class="list-group-item">
                                {{ $loop->index+1 }}. {{ $content->url }} <br>
                                <a class="btn btn-sm btn-primary" href="{{ route('contents.data', ['id' => $content->id]) }}" target="_blank">View Parsed Data</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>