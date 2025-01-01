<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="h4 fw-bold mb-4">Room - {{ $room->number }}</h1>
            <p class="mb-2"><strong>Size:</strong> {{ $room->size }}</p>
            <p class="mb-2">
                <strong>Status:</strong> 
                {!! 
                    match ($room->status) {
                        '0' => '<span class="text-danger">Close</span>',
                        '1' => '<span class="text-success">Open</span>',
                        '2' => '<span style="color:blue;">Maintenance</span>',
                        '3' => '<span style="color:orange;">Cleaning</span>',
                        default => '<span style="color:gray;">Unknown</span>',
                    } 
                !!}
            </p>
            <p><strong>Description:</strong> {{ $room->description }}</p>
            
            <!-- Display Multiple Images -->
            <div class="mb-4">
                <h5 class="fw-bold">Room Images:</h5>
                @if(!empty($room->image))
                    @php
                        $imageArray = json_decode($room->image, true);
                    @endphp
                    <div class="row">
                        @foreach($imageArray as $image)
                            <div class="col-md-4 mb-3 position-relative" >
                                <img style="max-width: 100%; max-height: 200px: " src="{{ asset('storage/rooms/' . $image) }}" alt="Room Image" class="img-thumbnail" style="max-width: 100%;">
                                <button 
                                    style="background-color: #f44336; color: #fff;text-decoration: none;"
                                    data-controller="button" 
                                    data-turbo="true" 
                                    data-button-confirm="Are you sure ?" 
                                    class="btn btn-link icon-link" 
                                    type="submit" 
                                    form="post-form" 
                                    formaction="{{ config('app.url')}}admin/rooms/{{$room->id}}/deleteimage?id={{$room->id}}&image={{$image}}">
                                    Delete
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No images available for this room.</p>
                @endif
            </div>

            
        </div>
    </div>
</div>
