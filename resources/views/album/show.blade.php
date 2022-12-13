<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($album->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    @forelse($album->photos as $photo)
                        <div class="card col-12 col-md-6">
                            <div class="card-body">
                                <img src="{{asset('photos/'.$album->name.'/'.$photo->name)}}">
                            </div>
                            <div class="card-footer">

                                <form method="post" action="{{route('photo.destroy',$photo->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-right"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <h1>No Data</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
