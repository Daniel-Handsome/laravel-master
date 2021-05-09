{{-- 迴圈停止 當碰到2停止  不會執行2 --}}
{{-- @break($key == 2) --}}
{{-- 跟上面相反 到1就跑 --}}
{{-- @continue($key == 1) --}}

//類似迴圈
@if ($loop->even)
    <div>{{ $key }} .{{ $con['title'] }}</div>
@else
    <div style="background-color:rgba(26, 24, 24, 0.308)">{{ $key }} .{{ $con['title'] }}</div>
@endif
