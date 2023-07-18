<option value="">--Please Select--</option>
@foreach($designationLists as $AllDesignationLists)
<option value="{{ $AllDesignationLists->id }}">{{ $AllDesignationLists->designation_name }}</option>
@endforeach
