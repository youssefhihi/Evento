

<form method="POST" action="{{ route('logout') }}" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
               @csrf
                  <i class="fas fa-sign-out-alt w-4 h-4"></i>
                   <button type="submit" >
                    Log Out
                    </button>
            </form>
