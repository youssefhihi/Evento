<x-admin-layout>

 

       


<!-- Main content header -->
<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
</div>
<!-- Start Content -->
<div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold text-xl">Total Users</span>
                <span class="text-xl font-semibold">{{$userCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-users text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold text-xl">Total Organizers</span>
                <span class="text-xl font-semibold">{{$organizerCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user-tie text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold text-xl">Total Clients</span>
                <span class="text-xl font-semibold">{{$clientCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold text-xl">Total Users Banned</span>
                <span class="text-xl font-semibold">{{$userBannedCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user-slash text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold text-xl">Total Event</span>
                <span class="text-xl font-semibold">{{$eventCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user-slash text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold text-xl">Total Event not improved</span>
                <span class="text-xl font-semibold">{{$eventCount}}</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user-slash text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
</div>

<div class="w-full">
    <div class="flex justify-between items-center flex-row w-full bg-gradient-to-r dark:from-black dark:to-gray-500 from-blue-900 via-blue-500 to-blue-300 rounded-md p-3">
        <form action="{{ route('admin') }}" method="GET" class="flex items-center space-x-2">
            @csrf
            <select name="filter" id="filter" class="border border-gray-300 rounded-md pl-2 text-sm focus:outline-none focus:border-blue-500">
                <option value="All" {{ $user === 'All' ? 'selected' : '' }}>All</option>
                <option value="clients" {{ $user === 'clients' ? 'selected' : '' }}>Clients</option>
                <option value="organizers" {{ $user === 'organizers' ? 'selected' : '' }}>Organizers</option>
            </select>
            <button type="submit" class="bg-white border border-red-600 text-red-600 hover:text-white px-4 p-1 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Filter</button>
        </form>
        <div class="mr-3">
            <form action="{{ route('admin') }}" method="GET">
                <input type="hidden" name="banned" value="1">
                <button type="submit">Users Banned</button>
            </form>
        </div>
    </div>
</div>

<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs text-center  font-medium tracking-wider text-left text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs  text-center font-medium tracking-wider text-left text-gray-500 uppercase tracking-wider">
                              Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs  text-center  font-medium tracking-wider text-left text-gray-500 uppercase tracking-wider">
                               banned
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-4 whitespace-nowrap text-center">                               
                                        <div class="text-sm font-medium text-gray-900">{{$user->name}}</div>
                                        <div class="text-sm text-gray-900">{{ $user->email }}</div>  
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $user->role }}</div>       
                          </td>       
                          <td class="px-6 py-4 whitespace-nowrap text-center">
                          @if($user->role === 'organizer')
                          @if($user->organizer->is_banned)                     
                              <form action="{{ route('admin.unbanUser') }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="user_id" value="{{ $user->organizer->id }}">
                                  <input type="hidden" name="role" value="organizer">
                                  <button type="submit" class="bg-gray-700 rounded-md text-white px-2 py-1">Unban User</button>
                              </form>
                          @else
                              <form action="{{ route('admin.banUser') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ $user->organizer->id }}">
                                  <input type="hidden" name="role" value="organizer">
                                  <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1">Ban User</button> 

                              </form>
                          @endif
                          @endif
                          @if($user->role === 'client')
                          @if($user->client->is_banned)                     
                              <form action="{{ route('admin.unbanUser') }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="user_id" value="{{ $user->client->id }}">
                                  <input type="hidden" name="role" value="client">
                                  <button type="submit" class="bg-gray-700 rounded-md text-white px-2 py-1">Unban User</button>
                              </form>
                          @else
                              <form action="{{ route('admin.banUser') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ $user->client->id }}">
                                  <input type="hidden" name="role" value="client">
                                  <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1">Ban User</button> 

                              </form>
                          @endif
                          @endif
                        </td>                  
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
      
      
      
   
</x-admin-layout>