<x-client-layout>
    @foreach ($tickets as $ticket)
        

<div class="w-screen h-screen flex flex-col">
	<section class="w-full flex-grow b flex items-center justify-center p-4">
		<div class="flex w-full max-w-3xl text-zinc-900 h-64">
			<div class="h-full bg-black flex items-center justify-center px-8 rounded-l-3xl border border-black">
				<img src=" {{asset('imgs/logo.png')}}" alt="" class="w-36 bg-white p-5 rounded-xl">
			</div>
			<div class="relative h-full flex flex-col items-center border-dashed justify-between border-2 bg-white border-zinc-900">
				<div class="absolute rounded-full w-8 h-8 bg-white -top-5"></div>
				<div class="absolute rounded-full w-8 h-8 bg-white -bottom-5"></div>
			</div>
			<div class="h-full py-8 px-10 bg-red-600 flex-grow rounded-r-3xl flex flex-col">
				
				<div>
                    <h1 class="text-white text-2xl text-center">{{$ticket->event->title}}</h1>
                </div>	
                <div class="flex w-full mt-auto justify-between">
					<div class="flex flex-col">
						<span class="text-xs text-black">Organizer</span>
						<span class="font-mono text-white">{{$ticket->event->organizer->user->name}}</span>
					</div>
                    
					<div class="flex flex-col">
						<span class="text-xs text-black">Name</span>
						<span class="font-mono text-white">{{$ticket->client->user->name}}</span>
					</div>
			</div>
				<div class="flex w-full mt-auto justify-between">
					<div class="flex flex-col">
						<span class="text-xs text-black">Date</span>
						<span class="font-mono text-white">{{$ticket->event->date}}</span>
					</div>
                    <div class="flex flex-col">
                        <span class="text-xs text-black">local</span>
                        <span class="font-mono text-white">{{$ticket->event->local}}</span>
                    </div>
					<div class="flex flex-col">
						<span class="text-xs text-black">Name</span>
						<span class="font-mono text-white">{{$ticket->client->user->name}}</span>
					</div>
			</div>
		</div>
	</section>
</div>
@endforeach
</x-client-layout>