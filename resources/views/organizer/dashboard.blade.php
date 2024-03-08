<x-organizer-layout>  
@if(session('success'))
    <script>
        setTimeout(function() {
            alert('{{ session('success') }}');
        }, 100);
    </script>
@endif
<!-- Main content header -->
<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
</div>
<!-- Start Content -->
<div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold ">Total Events</span>
                <span class="text-xl font-semibold">{{$eventCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-users text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold">Total reservations</span>
                <span class="text-xl font-semibold">{{$reservationCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user-tie text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    
    </div>
   
<div class="flex flex-col mt-6">
    <h1 class="text-2xl text-center bg-black text-white font-semibold p-2 mb-3 rounded-md">The Most Event Reserved</h1>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-2 text-xs text-center  font-medium tracking-wider  text-gray-500 uppercase ">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-2 text-xs  text-center font-medium tracking-wider  text-gray-500 uppercase ">
                              Title
                            </th>
                            <th scope="col" class="px-6 py-2 text-xs  text-center  font-medium tracking-wider text-gray-500 uppercase ">
                               Reservation
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($topEvents as $event)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-2 whitespace-nowrap text-center">                               
                              <div class="text-sm text-gray-900"> {{$event->id}}</div>  
                          </td>
                          <td class="px-6 py-2 ">
                            <a href="{{route('eventPage',$event->id)}}" title="see">
                              <div class="px-6 py-2 text-sm text-gray-500 whitespace-nowrap hover:underline ">{{ $event->title }}</div>       
                            </a>
                          </td>       
                        <td class="px-6 py-2 whitespace-nowrap text-center flex justify-center space-x-10">
                        <div class="px-6 py-2 text-sm text-gray-500 whitespace-nowrap hover:underline ">{{$event->reservation_count}}</div>       
                        </td>                  
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
      
</x-organizer-layout>