@extends('layouts.dashboard.master')

@section('title', 'Home')

@section('content')
<!-- top tiles -->
@if(auth()->user()->user_type == "admin")
    @include('layouts.dashboard.partials.top-tiles')
@endif
<!-- /top tiles -->

<div class="mb-3">
    <span class="h5">Welcome,</span> <span class="text-primary font-weight-bold h3">{{ auth()->user()->name }}</span>
</div>

<!-- Start to do list -->
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>To Do List <small>Sample tasks</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="">
          <ul class="to_do">
            @php
                $toDoList = ['a', 'b', 'c', 'd'];
            @endphp
            @forelse($toDoList as $toDoItem)
                <li>
                    <p>
                        {{-- <input type="checkbox" class="flat" {{ $toDoItem->is_checked == 'checked' ? 'checked' : '' }}> {{ $toDoItem }} --}}
                        <input type="checkbox" class="flat"> {{ $toDoItem }}
                    </p>
                </li>
            @empty
                There were nothing added yet.
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End to do list -->
@endsection
