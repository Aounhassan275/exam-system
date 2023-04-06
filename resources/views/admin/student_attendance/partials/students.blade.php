
@foreach($studentAttendances as $key => $studentAttendance)
<tr>
    <th>{{App\Helpers\Helpers::getUserName($key)}}</th>
    <th>{{$studentAttendance->sum('total_days')}}</th>
    <th>{{$studentAttendance->sum('attended_days')}}</th>
    <th>{{round($studentAttendance->sum('attended_days') / $studentAttendance->sum('total_days') * 100, 2) }} %</th>
</tr>
{{-- @foreach($studentAttendance as $index =>  $attendance)
<tr>
    <td>{{$index+1}}</td>
    <td>{{$attendance->subject->name}}</td>
    <td>{{$attendance->month}}</td>
    <td>{{$attendance->total_days}}</td>
    <td>{{$attendance->attended_days}}</td>
    <td></td>
</tr>
@endforeach --}}
@endforeach