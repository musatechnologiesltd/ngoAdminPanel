$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();

if($nothiLists1->dakType == 'registration'){

$allNoteListNew = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'renew'){

$allNoteListNew = DB::table('parent_note_for_renews')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'nameChange'){

$allNoteListNew = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType== 'fdNine'){

$allNoteListNew = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'fdNineOne'){

$allNoteListNew = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'fdSix'){

$allNoteListNew = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'fdSeven'){

$allNoteListNew = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'fcOne'){

$allNoteListNew = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'fcTwo'){

$allNoteListNew = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}elseif($nothiLists1->dakType == 'fdThree'){

$allNoteListNew = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
->get();

}
