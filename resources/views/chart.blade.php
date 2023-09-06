@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chart</div>

                <div class="card-body">
                    <div id="app">
                        {!! $chart->container() !!}
                    </div>
                    <script src="https://unpkg.com/vue"></script>
                    <script>
                        var app = new Vue({
                            el: '#app',
                        });
                    </script>
                    
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
