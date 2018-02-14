@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="row">
                            <div id="comments" style="border:0px solid black; padding: 0px;" class="col-md-12">
                                @foreach ($datas as $data)
                                    <b>{{ $data->comment }}</b><br><br>
                                @endforeach
                            </div>
                            {{ csrf_field() }}
                            <div class="col-md-12"><button class="btn btn-primary" id="btnRequest">request</button>
                            <div id="result">result</div>
                            <hr>
                            </div>
                            <div class="col-md-8">
                            
                            <input type="text" id="text" class="form-control" name="">
                                
                            </div>
                            <div class="col-md-4"><button class="btn btn-primary" id="btn1">Click me</button>
                            </div>
                            
                            

                            <script>
                                $(document).ready(function() {

                                    $('#btnRequest').click(function() {
                                        $.get('getRequest', function(data){
                                            console.log(data);
                                        $('#result').append(data);
                                        });

                                    });
                                    
                                    $('#btn1').click(function() {
                                     var text = $('#text').val();
                                        $.ajax({
                                            url: 'post',
                                            type: 'post',
                                            data: {
                                                '_token':$('input[name=_token ').val(),
                                                'comment':text,
                                            },
                                        })
                                        .done(function(data) {
                                            $('#text').empty();
                                            $('#result').html('comment added');
                                            $('#comments').load(location.href + ' #comments')
                                            console.log(data);
                                        })
                                        .fail(function() {
                                            console.log("error");
                                        })
                                        .always(function() {
                                            console.log("complete");
                                        });
                                        
                                     });

                                });


                            </script>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
