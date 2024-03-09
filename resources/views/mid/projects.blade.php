@extends('mid.layouts.master')

@section('content')
    <div class="THE-WORK-TITLE">
        <h2>
            {{$category->name}}
        </h2>
        <p>
            {{$category->name}}
            التي قمنا بتنفيذها
        </p>
    </div>
    <div class="container">
        <div class="pearnt-mosque-projjects mt-5">
                @foreach($projects as $project)
            <div class="one-mosque-projjects text-center">
                <img src=" {{asset('mid').$project->image}}" alt="">
                <h5 class="mt-4 text-end">{{$project->title}}</h5>
                <p class="text-end mt-4"><span>المدينة : </span>{{$project->location}}</p>
                <p class="text-end"><span>نوع التكييف : </span>{{$project->air_condition_type}}</p>
            </div>
            @endforeach
        </div>
    </div>
    {{$projects->links()}}


@endsection

