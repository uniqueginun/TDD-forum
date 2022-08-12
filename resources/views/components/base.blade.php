<x-layout>
   <div class="container">
       <div class="row">
        <div class="col-lg-3 mb-3">
           <a href="{{ route('welcome') }}"><h4>Ginun Forum</h4></a>
        </div>   
     </div> 
       <div class="row">
           <div class="col-lg-9 mb-3">
              
              <x-filters />

              {{ $slot }}
               
           </div>
           <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
               
              <div
                   style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;">
               </div>

               <x-sidebar />
           </div>
       </div>
   </div>
</x-layout>
