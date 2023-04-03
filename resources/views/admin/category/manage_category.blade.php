@extends("admin.master")
@section("content") 

<div class="content-wrapper">
  <section class="content-header">
    <h1>Category</h1>
    <ol class="breadcrumb"><li class="active">Category</li></ol>
  </section>
  <section class="content">
    
    <div class="box ">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="datatable table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allCategory as $categoryDetail)
                  <tr>
                    <td>{{$categoryDetail->name}}</td>
                    <td>
                      <a href="{{url('admin/edit-category/'.$categoryDetail->id)}}" class="btn btn-info" target="_blank">Edit</a> 
                      <button data-href="{{url('admin/category?categoryid='.$categoryDetail->id)}}" onclick="delme(this.id)" id="{{$categoryDetail->id}}"  class="btn bg-danger">Delete</button> 
                      <a href="{{url('admin/upload-tiles/'.$categoryDetail->id)}}" class="btn btn-success" target="_blank">Upload Tiles</a>
                      <a href="{{url('admin/view-tiles/'.$categoryDetail->id)}}" class="btn btn-warning" target="_blank">View Tiles</a>
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
  bootbox.confirm("<br><div class='alert alert-danger'>Are you sure you want to delete this category? All images will delete</div>",function(r){
  
    if(r){
      window.location.assign(ADMIN_URL+'category?categoryid='+id);
    }

});

}

</script>
@endsection 