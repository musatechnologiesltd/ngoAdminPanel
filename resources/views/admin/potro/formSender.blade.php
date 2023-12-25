<form class="custom-validation" action="{{ route('officeSarok.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf
                                                                            <input type="hidden" value="{{ $id }}" name="noteId"/>
                                                                            <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
                                                                            <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
                                                                            <input type="hidden" value="{{ $parentId }}" name="dakId"/>
                                                                            <input type="hidden" value="{{ $id }}" name="parentNoteId"/>
                                                                            <input type="hidden" value="{{ $status }}" name="status"/>


                                                                          <input type="hidden" name="updateOrSubmit" id="updateOrSubmit" value="1"/>
                                                                          <input type="hidden" name="sorkariUpdateId" id="sorkariUpdateId" value="{{ $officeDetails->id }}"/>
                                                                          <div class="d-flex justify-content-start mt-3">
                                                                              <p style="font-weight:bold">বিষয় : </p>
                                                                                <textarea id="ineditor1" name="subject" contenteditable="true">
                                                                                    {!! $potrangshoDraft->office_subject !!}
                                                                                </textarea>
                                                                            </div>
                                                                        <div class="d-flex justify-content-start">
                                                                            <p style="font-weight:bold">সুত্রঃ </p>
                                                                            <textarea id="ineditor2" name="sutro" contenteditable="true">
                                                                                     {!! $potrangshoDraft->office_sutro !!}
                                                                            </textarea>

                                                                            <input type="hidden" name="parentIdForPotrangso" id="parentIdForPotrangso" value="{{ $id }}"/>
                                                                            <input type="hidden" name="statusForPotrangso" id="statusForPotrangso" value="{{ $status }}"/>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-xl-12">

                                                                                    <label class="btn btn-primary" id="sompadonButton">সম্পাদন করুন</label>


                                                                                    <button class="btn btn-primary" type="submit" style="display: none;" id="sompadonButtonOne">সম্পাদনা শেষ করুন </button>
    <br>
                                                                                    {{-- <p>পত্রের বিষয়বস্তু.........................</p> --}}

                                                                                    <div id="firstBisoyBostu"> {!! $potrangshoDraft->description !!}</div>

                                                                                    {{-- <textarea id="editor1222"   class="mainEdit mt-2 secondBisoyBostu"  name="maindes" >
                                                                                            {!! $officeDetails->description !!}
                                                                                        </textarea> --}}

                                                                                        <textarea   style="display: none;" class="mainEdit mt-2 secondBisoyBostu"  name="maindes" >
                                                                                            {!! $potrangshoDraft->description !!}
                                                                                        </textarea>


                                                                            </div>
                                                                        </div>




                                                                </form>
