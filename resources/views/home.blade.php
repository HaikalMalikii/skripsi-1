@extends('layouts.app')

@section('content')
<style>
.flex-container {
  display: flex;
}
.flex-container > div {
    background-color: red;
  flex:70%;
  padding: 20px;

}
.flex-container2 > div {
  background-color: yellow;
  flex:30%;
  padding: 20px;

}



</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="d-flex justify-content-between">
                <div class="flex-container">
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-primary">Primary</button>
                    <div>
                    <button type="button" class="btn btn-primary">Primary</button>
                    
                    </div>
                </div>
                <div class="flex-container2">
                    2
                </div>
            </div>


        </div>

                <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                </div>
            </div>` -->
        </div>
    </div>
</div>
@endsection
