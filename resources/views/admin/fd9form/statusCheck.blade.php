<?php

$checkTracking =DB::table('secruity_checks')
->where('n_visa_id',$mainNVisaId)->get();;

?>
  @if(count($checkTracking) == 0)

  <h1>Not Submitted</h1>

  @else


  <table class="table table-bordered mt-5">
      <thead>
        <tr>

          <th scope="col">Tracking Number</th>
          <th scope="col">Status Name</th>

        </tr>
      </thead>
      <tbody>
          @foreach($checkTracking as $key=>$AllCheckTracking)
        <tr>

          <td>{{ $AllCheckTracking->tracking_no }}</td>
          <td>{{ $AllCheckTracking->statusName }}</td>

        </tr>
        @endforeach

      </tbody>
    </table>

  @endif
