@props(['title', 'count', 'color', 'icon'=>"", "h3Class"])  

<div class="col-lg-3 col-6">
    <div class="small-box bg-{{$color}}">
        <div class="inner">
            <h3 class="{{$h3Class}}">{{$count}}</h3>
            <p>{{$title}}</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    <!--  <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>-->
    </div>    
</div>