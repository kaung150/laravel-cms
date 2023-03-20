@extends ('layout.auth')

 
@section('title', 'Create Post')

@section('styles')


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


@endsection


@section('content')
        <div class="content">
        
          
            <div class="card card-user m-auto">
              <div class="card-header">
                <h5 class="card-title">Add A New Article</h5>
              </div>

              @if($errors->any())

                <div class="alert alert-danger">
                  <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-warning">{{$error}}</li>
                    @endforeach
                  </ul>
                </div>

              @endif
              
              <div class="card-body">
                
              <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                   @csrf  
                    
                      <div class="form-group">
                        <label>Article Title</label>
                        <input type="title" class="form-control" placeholder="title" name="title" value="{{old('title')}}" required>
                      </div>
                    
                      <div class="form-group">
                        <label>Category List</label>
                        <select name="category" class="form-control" required>
                          <option disabled selected>Choose Option</option>
                          @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <option @selected(old('category') == $category->id)  value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                    
                      <div class="form-group">
                        <label>Published</label>
                        <select name="is_published" class="form-control" required>
                        <option disabled selected>Choose Option</option>
                          <option value="1">Published</option>
                          <option value="0">Draft</option>
                        </select>
                      </div>

                      
                      <div class="mb-3">
                        <label for="">Upload Image</label>
                        <input type="file" class="form-control" name="file" required value = "{{old('file')}}">
                      </div>
                      
                       <div class="form-group mt-2 "  > 
                        <label>Discription</label>
                        <textarea class="form-control textarea"  name="description" required>{{old('description')}}</textarea>
                       </div>
                
                    
                      <button type="submit" class="btn btn-primary ">Submit Post</button>
                    </div>
                  
                </form>

              </div>
            </div>
          
        </div>
     
@endsection


@section('scripts')



<script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace('description');
</script>



@endsection