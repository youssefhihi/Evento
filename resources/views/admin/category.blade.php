<x-admin-layout>
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
        <div class="w-full">
            <div class="flex justify-between items-center flex-row w-full bg-gradient-to-r dark:from-black dark:to-gray-500 from-blue-900 via-blue-500 to-blue-300 rounded-md p-3">
                <form action="{{ route('category.index') }}" method="GET" class="flex items-center space-x-2">
                    <select name="filter" id="filter" class="border border-gray-300 rounded-md pl-2 text-sm focus:outline-none focus:border-blue-500">
                        <option value="categories" {{ $trashed === 'categories' ? 'selected' : '' }}>Category</option>
                        <option value="All" {{ $trashed === 'All' ? 'selected' : '' }}>All</option>
                        <option value="archive" {{ $trashed === 'archive' ? 'selected' : '' }}>Deleted</option>
                    </select>
                    <button type="submit" class=" bg-white border border-red-600 text-red-600 hover:text-white px-4 p-1  rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">filter</button>
                </form>
                <div class="mr-3">
                    <i class="fas fa-plus text-white text-3xl cursor-pointer" onclick="OpenAddCategory()"></i>
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
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Operation
                                </th>
                            </tr>
                        </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900">{{ $category->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                </td>
                                @if($trashed !== 'archive')
                                <td class="px-6 py-4 flex justify-center space-x-10">
                                    <i class="fas fa-trash-alt cursor-pointer" onclick="OpenDeleteCategory({{ $category->id }})"></i>
                                    <i class="fas fa-edit cursor-pointer" onclick="OpenEditCategory({{ $category->id }})"></i>
                                </td>
                                @else
                                <td class="px-6 py-4 flex justify-center space-x-10">
                                <form action="{{ route('category.restore', $category->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"><i class="fas fa-trash-alt cursor-pointer"></i> </button>     
                                </form>

                                </td>
                                    @endif
                                </tr>
                                        
                                                                    
                    
     <!-- Popup Delete $category -->
      <!-- ______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________                                                        -->
                                
      <div id="DeleteCategory{{ $category->id }}" class=" hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" >
                                    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                                        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                            <div class="text-center p-5 flex-auto justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                                                <p class="text-sm text-gray-500 px-8">Do you really want to delete this category?
                                                                maybi this category was in accounts for doctors </p>    
                                            </div>                                      
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="p-3  mt-2 text-center space-x-4 md:block">
                                                    <button type="button" onclick="closeDeleteCategory({{ $category->id }})" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                                        Cancel
                                                    </button>
                                                    <button class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600"
                                                        type="submit">Delete</button>
                                                </div>        
                                            </form>                                          
                                        </div>
                                    </div>
                                                                                             <!-- Popup Update category -->
      <!-- ______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________                                                        -->

                                <div id="EditCategory{{ $category->id }}" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
                                        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                                    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                            <!-- Form to Edit category -->
                                            <form method="POST" action="{{ route('category.update', $category->id) }}" class="space-y-4">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex flex-col">
                                                    <x-input-label for="category" :value="__('category')" />
                                                    <x-text-input id="category" class="block mt-1 w-full" type="text" name="name" :value="$category->name" />
                                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                                </div>
                                                <div class="flex space-x-14 justify-end mt-5">
                                                    <button type="button" onclick="CloseEditCategory({{ $category->id }})" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</button>
                                                    <x-primary-button class="ms-4">
                                                        {{ __('Update') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                              

                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>


                                                                         <!-- Popup Add category -->
      <!-- ______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________                                                        -->

            <div id="AddCategory" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                    <!-- Form to add category -->
                    <form method="POST" action="{{route('category.store') }}" class="space-y-4">
                    @csrf
                        <div class="flex flex-col">
                        <x-input-label for="category" :value="__('category')" />
                        <x-text-input id="category" class="block mt-1 w-full" type="text" name="name" :value="old('category')" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />            
                    <div class="flex space-x-14 justify-end mt-5">
                        <button  onclick="CloseAddCategory()" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5  text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</button>
                        <x-primary-button class="ms-4">
                            {{ __('Save') }}
                        </x-primary-button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

                   

</x-admin-layout>


