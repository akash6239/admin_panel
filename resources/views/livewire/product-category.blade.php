<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h4>Add New Category</h4>
                <p class="sub-header">
                categories for your store can be managed here.
                </p>

                <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Name</label>
                            <input type="text" id="category_name" class="form-control" wire:model.defer="category_name">
                            @error('category_name') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="example-input-normal" class="form-label">Slug</label>
                                <input type="text" id="slug" class="form-control" wire:model.defer="slug" value="">
                                @error('slug') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                         <div class="mb-3">
                        <label for="example-input-normal" class="form-label">Type</label>
                            <select  id="category_type" class="form-control" wire:model.defer="category_type">
                                <option value="None" class="py-2">None</option>
                                <option value="Products" class="py-2">Products</option>
                                <option value="Blog">Blogs</option>
                                <option value="Pages">Pages</option>
                            </select>
                            @error('category_type') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                          </div>
                        </div>

                      <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="example-input-normal" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" wire:model.defer="meta_title">
                                @error('meta_title') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="example-input-normal" class="form-label">Meta Keyword</label>
                                <input type="text" class="form-control"  id="meta_keyword" wire:model.defer="meta_keyword">
                                @error('meta_keyword') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="example-textarea" class="form-label">Meta Description</label>
                            @error('meta_description') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span>  @enderror
                            <textarea class="form-control" id="meta_description" rows="5" wire:model.defer="meta_description"></textarea>
                        </div>
                    </div>
                      <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Image : </label>
                            <input type="file" id="name" wire:model="category_image">
                            @error('category_image') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                        </div>
                      </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                    <input type="submit" class="btn btn-primary btn-lg px-5" value="Add" />
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                            </div>
                        </div>
                </div>
                <!-- end roe -->

                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">

            <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Action</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Date</th>


            </tr>
        </thead>
        <tbody>

         @foreach($categories as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                       <a href="" class="btn btn-primary p-1"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger p-1"><i class="fa fa-trash"></i></a>

                </td>

                <td class="text-start px-2"><img src="{{asset('photos/image')}}/{{$data->category_image) }}" alt="" srcset="" width="30" height="30"></td>

                <td>{{ $data->category_name}}</td>
                <td>{{$data->slug}}</td>
                <td>{{$data->category_type}}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>

            </tr>
          @endforeach
        </tbody>
    </table>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

