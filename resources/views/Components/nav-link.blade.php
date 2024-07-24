@props(['active' => false, 'type' => 'a'])

<?php if ($type=="a") : ?>
<a {{$attributes}} class="{{ $active ? 'block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white' : 'text-white hover:bg-gray-700 hover:text-white' }}">{{$slot}}</a>

<?php else  : ?>
<button {{$attributes}} class="{{ $active ? 'block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white' : 'text-white hover:bg-gray-700 hover:text-white' }}">{{$slot}}</button>

<?php endif ?>