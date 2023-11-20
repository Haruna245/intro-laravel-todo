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
            <select class="form-select form-select" aria-label=".form-select-sm example" name="status">
            <option selected >---open to select the status---</option>
            <option value="completed">completed</option>
            <option value="ongoing">ongoing</option>
            
          </select>
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
             @if($lst->status == 'completed')
             <button class="btn btn-outline-light" onclick="myFunction(document.getElementById('inputID{{$lst->id}}'))">
              <input disabled checked class="form-check-input flex-shrink-0 " type="checkbox" value="" id="Id" >
            </button>
            <div class="w-100 m-1 ">
          <div class="row">
            <div class="col">
              <s> {{$lst->title}}</s> 
                <small class="d-block text-body-secondary"> <s>{{$lst->description}}</s> </small>
                <small class="d-block text-body-secondary"> <s>Status: {{$lst->status}}</s> </small>
                <small class="d-block text-body-secondary"><input type="text" class="d-none" value="{{$lst->id}}" id="inputID{{$lst->id}}"> </small>
            </div>
            <div class="col">
              
            </div>
            <div class="col">
            <a href="updatePage/{{$lst->id}}" class="btn btn-success mt-3">update</a>
                <a href="delete/{{$lst->id}}" class="btn btn-danger mt-3">delete</a>
            </div>
          </div>
        </div>
             @else
             <button class="btn btn-outline-light" onclick="myFunction(document.getElementById('inputID{{$lst->id}}'))">
              <input class="form-check-input flex-shrink-0 " type="checkbox" value="" id="Id" >
            </button>
            <div class="w-100 m-1 ">
          <div class="row">
            <div class="col">
            {{$lst->title}} 
                <small class="d-block text-body-secondary">  {{$lst->description}}</small>
                <small class="d-block text-body-secondary">Status: {{$lst->status}}</small>
                <small class="d-block text-body-secondary"><input type="text" class="d-none" value="{{$lst->id}}" id="inputID{{$lst->id}}"> </small>
            </div>
            <div class="col">
              
            </div>
            <div class="col">
            <a href="updatePage/{{$lst->id}}" class="btn btn-success mt-3">update</a>
                <a href="delete/{{$lst->id}}" class="btn btn-danger mt-3">delete</a>
            </div>
          </div>
        </div>
             @endif
            
            <span>
                
            </span>
            
                
            
            </label>
           
        </div>
            @endforeach
        </div>
    </div>
    
    </div>

    <script>

function myFunction(inputField) {
      let inputID = inputField.value;
      console.log(inputID);
            fetch('http://127.0.0.1:8000/api/value', {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id: inputID,value:"completed"}),
            })
            .then(response => {
                // Check if the request was successful (status code 200)
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                // Parse the JSON data from the response
                return response.json();
            })
            .then(data => {
                // Handle the data
                console.log('Data:', data);
                location.reload();
            })
            .catch(error => {
                // Handle errors
                console.error('Error:', error);
            });
        }
</script>
    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>