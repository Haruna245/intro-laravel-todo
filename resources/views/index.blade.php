<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="">
        @if(Session::get('success'))
            <div class="m-2 alert alert-success alert-dismissible fade show">
                {{Session::get('success')}}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(Session::get('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
    <div class="container-fluid d-flex justify-content-center mt-4">

        <div class="" style="width: 50%;">

            <div class="d-flex justify-content-center">
            <h1>TODO LIST</h1>
            </div>
            
            <hr>
            <div class="d-flex justify-content-end mb-4">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Activity
            </button>
            </div>
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add An Activity</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <form action="create" method="post">
          @csrf
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputEmail4" name="title">
          </div>
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Description</label>
            <input type="text" class="form-control" id="inputEmail4" name="description">
          </div>
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Status</label>
            <input type="text" class="form-control" id="inputEmail4" name="status" value='' >
          </div>
          

          <div class="modal-footer mt-5">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
            
          </div>

          </form>
            <!-- Other modal content goes here -->
            
          </div>
          
        </div>
      </div>
        </div>
            @foreach($list as $lst)
            <div class="list-group mb-1">
            <label class="list-group-item d-flex gap-2">
            <input class="form-check-input flex-shrink-0 " type="checkbox" value="{{$lst->id}}" >
            <span>
            {{$lst->title}}
                <small class="d-block text-body-secondary">{{$lst->description}}</small>
                <small class="d-block text-body-secondary">Status: {{$lst->status}}</small>
                <!-- <button class="btn btn-primary mt-3">
                    update
                </button> -->
                <a href="updatePage/{{$lst->id}}" class="btn btn-success mt-3">update</a>
                <a href="delete/{{$lst->id}}" class="btn btn-danger mt-3">delete</a>

            </span>
            
                
            
            </label>
        </div>
            <!-- <p>{{$lst->id}}</p>
            <p>{{$lst->title}}</p>
            <p>{{$lst->description}}</p> -->
            @endforeach
        </div>
    </div>
    <!-- <div>
    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <div class="list-group">
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked>
      <span>
        First checkbox
        <small class="d-block text-body-secondary">With support text underneath to add more detail</small>
      </span>
    </label>
  </div>

</div>
    </div> -->
  <!--   <div>

        <form action="create" method="post">
            @csrf
            title: <input type="text" name="title"> <br>
            description: <input type="text" name="description"> <br>
            status: <input type="text" name="status"> <br>
    
            <input type="submit" value="submit">
        </form>
    </div> -->
    
    </div>

    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>