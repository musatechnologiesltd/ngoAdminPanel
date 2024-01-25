
<?php
$getUserId = DB::table('fd_one_forms')->where('id',$ngoId)->value('organization_name');
$getUserId1 = DB::table('fd_one_forms')->where('id',$ngoId)->value('registration_number');
?>
Dear <b>{{$getUserId}}</b>,

@if($id == 'Accepted')

your NGO registration has been {{ $id }}. officially registered!.

@elseif($id == 'Rejected' || $id == 'Correct')

Unfortunately,

<b>
@if($id = 'Correct')
your NGO registration need some Correction
@else
your NGO registration has been {{ $id }}

@endif
</b>

@endif



<p><b>NGO Affairs Bureau</b> <br>
    Prime Minister's Office <br>
    Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207
</p>
