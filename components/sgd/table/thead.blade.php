 @props([
     'id' => '',
     'headers' => [],
     'trid' => '',
     'trclass' => '',
     'thid' => '',
     'thclass' => 'whitespace-nowrap p-1 font-medium text-sm text-left border-b dark:border-black/10 border-gray-300',
 ])
 <thead
     id="{{ $id }}"
     {{ $attributes->merge(['class' => '']) }}
 >
     <tr
         id="{{ $trid }}"
         class="{{ $trclass }}"
     >
         <th
             class="border-r dark:border-black/10 border-gray-300 {{ $thclass }} !text-center"
             width="2%"
         >
             Sl
         </th>
         @foreach ($headers as $header)
             <th
                 id="{{ $thid }}"
                 class="{{ $thclass }}"
             >
                 {{ headline($header) }}
             </th>
         @endforeach
         <th
             class="{{ $thclass }} !text-center"
             width="5%"
         >
             Status
         </th>
         {{--  <th class="{{ $thclass }} !text-center" width="5%">
             Created By
         </th>
         <th class="{{ $thclass }} !text-center" width="5%">
             Created At
         </th> --}}
         <th
             class="border-l dark:border-black/10 border-gray-300 {{ $thclass }} !text-center"
             width="5%"
         >
             Actions
         </th>
     </tr>
 </thead>
