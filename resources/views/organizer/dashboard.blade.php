<x-organizer-layout>  
      
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
                <span class="text-xl font-semibold">232</span>
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
                <span class="text-xl font-semibold">232</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user-tie text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="font-semibold ">top Events booked</span>
                <span class="text-xl font-semibold">29</span>
            </div>
            <div class="p-6 bg-gray-200 rounded-md">
                <i class="fas fa-user text-4xl text-gray-600"></i>
            </div>
        </div>
    </div>
   
</x-organizer-layout>