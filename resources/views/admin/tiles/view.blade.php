@extends("admin.master")
@section("content") 

<div class="content-wrapper">
  <section class="content-header">
    <h1>{{$allTiles->name}} Images</h1>
    <ol class="breadcrumb"><li class="active">{{$allTiles->name}} Images</li></ol>
  </section>
  <section class="content">
    
    <div class="box ">
      <div class="box-body">
        <div class="row">

        <div class="col-md-12" style="margin:20px 0px;">

            @if ($errors->any())
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if(session()->has('error'))

                <div class="col-md-12 alert alert-danger" style="display:block;">

                    {{ session()->get('error') }}

                </div>

            @endif

            @if(session()->has('success'))

                <div class="col-md-12 alert alert-success" style="display:block;">

                    {{ session()->get('success') }}

                </div>

            @endif

            </div>
          <div class="col-md-12">
            <div class="table-responsive image-management">
              <table class="datatable table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Images</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php 
                    $allTilesImages = json_decode($allTiles->stock,true);
                    $tileCategory = str_replace(" ","_",strtolower($allTiles->name));
                    @endphp
                  @foreach($allTilesImages as $fileName)
                  <tr>
                    <td><img src="{{url('img/tiles/'.$tileCategory.'/'.$fileName)}}" style="width:250px; height:250px;"></td>
                    <td>
                       <button data-href="{{url('admin/tiles?tile_id='.$allTiles->id.'&tilesName='.$fileName)}}" onclick="delme(this.id)" id="{{$allTiles->id}}" data-filename="{{$fileName}}" data-catid="{{$allTiles->cat_id}}" class="btn bg-danger">Delete</button> 
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>

function delme(id) {
   let filename = $(".image-management #"+id).data("filename");
   let catID = $(".image-management #"+id).data("catid");
  bootbox.confirm("<br><div class='alert alert-danger'>Are you sure you want to delete this image?</div>",function(r){
  
    if(r){
        window.location.assign(ADMIN_URL+'view-tiles/'+catID+'?fileId='+id+'&filename='+filename);
    }

});

}

</script>
@endsection 