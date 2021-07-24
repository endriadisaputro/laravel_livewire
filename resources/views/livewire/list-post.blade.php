<div>
    @foreach($posts as $post)
    	<div class="bg-white shadow-xl" style="padding: 10px; margin-top: 10px; ">
    		<div style="display: block;">
    			<span class="text-xl" style="font-weight: bold;">{{$post->user->name}}</span>
    			<span>{{$post->created_at->diffForHumans()}}</span>
    			<button wire:click="showUpdateForm({{$post->id}})" class="text-sm font-medium rounded-md text-white bg-indigo-600 py-1 px-2">Edit</button>
    			<button wire:click="delete({{$post->id}})" onclick="return confirm('Yakin mau di hapus?') || event.stopImmediatePropagation()"  class="text-sm font-medium rounded-md text-white bg-red-600 py-1 px-2">Delete</button>
    		</div>
    		<div>
    			@if($updateStateId !== $post->id)
    				<span>{{$post->body}}</span>
    			@endif

    			@if($updateStateId === $post->id)
    				<input wire:model="body" required class="appearance-none rounded relative w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" style="margin-bottom: 10px">

    				<button wire:click="update({{$post->id}})" class="text-sm font-medium rounded-md text-white bg-indigo-600 py-1 px-2">save</button>
    			@endif
    		</div>
    	</div>
    @endforeach
</div>
