@props(['title', 'count', 'icon', 'color', "h3Class"])  

<div class="col-12">
    <div class="small-box bg-{{$color}}">
        <div class="inner">
            <div class="row pr-2 d-flex justify-content-center items-align-center">
                <div class="col-4">
                    <div class="w-50 mt-4">
                        <i class="fa fa-{{$icon}} fa-2x"></i>
                    </div>  
                </div>
                <div class="col-8 text-right">
                    <h3 class="{{$h3Class}}">{{$count}}</h3>
                    <p>{{$title}}</p>
                </div>
            </div>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>    
</div>