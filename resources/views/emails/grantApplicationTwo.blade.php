
<?php
$get_user_id = DB::table('fd_one_forms')->where('id',$ngoId)->value('organization_name');
$get_user_id1 = DB::table('fd_one_forms')->where('id',$ngoId)->value('registration_number');
?>

@if($id == 'Ongoing')
Dear <b>{{$get_user_id}}</b>,

your <b>Project proposal form accepted by individuals for foreign grants</b> has been {{ $id }}. We'll assess the situation, and consider the next steps. Your dedication remains valuable, and we'll overcome this setback together.



<p><b>NGO Affairs Bureau</b> <br>
    Prime Minister's Office <br>
    Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207
</p>

@elseif($id == 'Accepted')
<p>Dear <b>{{$get_user_id}}</b>,</p>
<p>We are excited to announce that your <b>Project proposal form accepted by individuals for foreign grants</b>, has been officially Accepted! 🎉 <b style="font-size: 18px;">Congratulations</b>
    to each one of you for
    making this significant achievement possible.</p>
<p>Your NGO Registration NO: <b>{{ $get_user_id1 }}</b></p>
<p>Thank you for your tireless efforts and unwavering belief in our mission. As we move forward, let's carry this same
    enthusiasm and determination to create positive change in our community.</p>
<p>Congratulations once again!</p>
<p>Best regards, <br>
    <b>NGO Affairs Bureau</b> <br>
    Prime Minister's Office <br>
    Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207</p>
@elseif($id == 'Rejected' || $id == 'Correct')


Dear <b>{{$get_user_id}}</b>,

Unfortunately,

<b>
    @if($id = 'Correct')
    your <b>Project proposal form accepted by individuals for foreign grants</b> need some Correction.
    @else
    your <b>OProject proposal form accepted by individuals for foreign grants</b> has been {{ $id }}.

    @endif
    </b>
    <br>
    <b>"{{ $comment }}"</b> , <br> We'll assess the situation, and consider the next steps. Your dedication remains valuable, and we'll overcome this setback together.



<p><b>NGO Affairs Bureau</b> <br>
    Prime Minister's Office <br>
    Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207
</p>
@endif



