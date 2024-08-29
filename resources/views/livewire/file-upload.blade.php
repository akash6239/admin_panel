<div>
<div class="row bg-white px-3 p-3">
        <div class="col-lg-12">
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
        <form wire:submit.prevent="save">
            <input type="file" wire:model="photos" multiple>
            <button type="submit " class="btn btn-primary">Save Photo</button>
            @error('photos.*') <span class="error">{{ $message }}</span> @enderror
        </form>
  </div>
</div>

<div class="row showallimages mt-2 bg-white border py-2 px-3" >
          @foreach ($files as $file)
                <div class="col-lg-2">
                  <div class="mx-1 mt-2 border p-1 image-overview">
                   <img src="{{asset('photos/image/'.$file)}}"  alt="Image" class="fileuploadcls">
                   <div class="imageabou">
                     <span class="bg-primary text-white p-1">Preview</span>
                     <span class="bg-danger text-white p-1" wire:click="delete('{{ $file }}')">Delete</span>
                  </div>
                  </div>

                </div>
            @endforeach
</div>

</div>
