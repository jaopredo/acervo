<label class="hover:cursor-pointer" data-value="{{$id}}" for="{{$id}}">{{$label}}</label>
<input type="radio" name="{{$name}}" checked="{{$checked}}" id="{{$id}}" class="hidden">
<span class="radio-span"></span>

@once
    @push('styles')
        @vite('resources/css/components/radio.scss')
    @endpush    
@endonce