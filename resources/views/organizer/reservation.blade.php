<x-organizer-layout>
<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-2 text-xs text-center  font-medium tracking-wider text-left text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-2 text-xs  text-center font-medium tracking-wider text-left text-gray-500 uppercase tracking-wider">
                              Title
                            </th>
                            <th scope="col" class="px-6 py-2 text-xs  text-center  font-medium tracking-wider text-left text-gray-500 uppercase tracking-wider">
                               Operation
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reservations as $reservation)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-2 whitespace-nowrap text-center">                               
                              <div class="text-sm text-gray-900">{{ $reservation->client->user->email }}</div>  
                          </td>
                          <td class="px-6 py-2 ">
                            <div>
                              <div class="px-6 py-2 text-sm text-gray-500 whitespace-nowrap hover:underline ">{{ $reservation->event->title ?? 'None' }}
</div>       
                            </div>
                          </td>       
                        <td class="px-6 py-2 whitespace-nowrap text-center flex justify-center space-x-10">
                        <form action="{{ route('reservation.update', $reservation) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="bg-green-400 px-3 py-1 rounded-md text-white">
                                  Accept
                              </button>
                          </form>
                          <form action="{{ route('reservation.destroy', $reservation) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="bg-red-400 px-3 py-1 rounded-md text-white">
                                  Refuse
                              </button>
                          </form>
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