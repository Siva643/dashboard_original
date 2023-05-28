@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="" style="text-align: center;">{{ __('Live section') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            
                            <!DOCTYPE html>
    
                            <head>
                                <meta charset="UTF-8">
                                <meta http-equiv="x-UA-Compatible" content="IE=edge"
                                <meta name="viewport"
                            content="width=device-width, initial-scale=1.0">
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                                 rel="stylesheet">
                            <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet"/>
                            <script defer src="https://vjs.zencdn.net/7.20.3/video.min.js">
                            </script>
                            <script defer src="script.js"></script>
                            
                            <title>RFM</title>
                            <style>
                                video{
                                    
                                    
                                }
                            </style>
                            </head>
                            <body style="background-color: rgb(236, 232, 232);">
                            <h5 class="card-title fw-blod">{{ __('Live') }}</h5>

                                <div class="container p-5 d-flex align-items-center justify-content-center" style="margin-bottom:180px !important;">
                                    <div class="row">
                            
                                        <div class="col-md-6">
                                            <video id="my-video"
                                                onplay="videoView(1)" onended="videoEnd(1)"
                                                class="video-js"
                                                controls
                                                preload="auto"
                                                width="400" height="300">
                                                    <source src="http://gfm.dyndns.tv:1936/hls/tfm.m3u8"
                                                    type="application/x-mpegURL">
                                            
                                            </video>
                                        </div>
                                        <div class="col-md-6">
                                            <video onended="videoEnd(2)" onplay="videoView(2)" style="width:400px !important;height:300px !important;" id="my-video2"
                                            class="video-js"
                                            controls
                                            preload="auto"
                                            width="500" height="800"
                                            >
                                            
                                                <source src="http://gfm.dyndns.tv:1936/hls/rfm.m3u8"  
                                                type="application/x-mpegURL">
                                            
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            <script>
                              
                            window.addEventListener('DOMContentLoaded',  () => {
                            const player = videojs( 'my-video', {});
                            const player2 = videojs('my-video2',{});
                            });
                            
                            </script>
                            </body>
                            </html>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
 
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        /* window.addEventListener('beforeunload', function() {
            console.log("pp");
            videoEnd(1);
            videoEnd(2);
        });
         */function videoView(videoId) {
            ajaxHeader()
            
            $.post("video-view", {videoId : videoId}, function(){
                console.log("sent")
            })
            .done(function(data){
                console.log(data)
                
            })
            .fail(function(error) {
                console.log("failed")
            })
        }
        
        function videoEnd(videoId) {
            ajaxHeader()
            
            $.post("video-ended", {videoId : videoId}, function(){
                console.log("sent")
            })
            .done(function(data){
                console.log(data)
                
            })
            .fail(function(error) {
                console.log("failed")
            })
        }

        function ajaxHeader() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    </script>
@endpush