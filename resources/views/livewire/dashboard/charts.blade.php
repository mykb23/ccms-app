<div class=' bg-white'>
    <div class="grid grid-cols-2 gap-2 md:grid-cols-2 p-2">
        @if (!auth()->user()->hasAnyRole('User'))
        <div class="col-span-auto p-6 m-20">
            {!! $chartUser->container() !!}
        </div>
        @endif
        <div class="col-span-auto p-6 m-20">
            {!! $chart->container() !!}
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ $chart->cdn() }}"></script>
{!! $chart->script() !!}
<script src="{{ $chartUser->cdn() }}"></script>
{!! $chartUser->script() !!}
@endpush
