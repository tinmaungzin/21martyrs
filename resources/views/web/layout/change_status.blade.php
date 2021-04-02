<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('change_status.inform',['post'=> $post->id])}}" method="post">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">{{__('forms.change_status')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="Status">{{__('forms.status_label')}}</label>
                    @if($post->status == 'Detained')
                        <select class="form-control" id="status_edit"  name="status"  required>
                            <option value="">{{__('forms.status_title')}}</option>
                            <option value="dead">{{__('home.dead')}}</option>
                            <option value="missing">{{__('home.missing')}}</option>
                            <option value="released">{{__('home.released')}}</option>
                        </select>
                    @endif
                    @if($post->status == 'Missing')
                        <select class="form-control" id="status_edit" name="status" required>
                            <option disabled selected>{{__('forms.status_title')}}</option>
                            <option value="dead">{{__('home.dead')}}</option>
                            <option value="detained">{{__('home.detained')}}</option>
                            <option value="released">{{__('home.released')}}</option>
                        </select>
                    @endif
                    @if($post->status == 'Released')
                        <select class="form-control" id="status_edit" name="status" required>
                            <option disabled selected>{{__('forms.status_title')}}</option>
                            <option value="dead">{{__('home.dead')}}</option>
                            <option value="detained">{{__('home.detained')}}</option>
                            <option value="missing">{{__('home.missing')}}</option>
                        </select>
                    @endif
                </div>
                <div id="extension"></div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('forms.informer_name_label')}}</label>
                    <input type="text" required name="informant_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{(__('forms.name_placeholder'))}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('forms.relationship_label')}}</label>
                    <select class="form-control" name="informant_association_with_victim" required>
                        <option value="">{{ __('forms.choose_relationship') }}</option>
                        <option value="Family">{{__('forms.family')}}</option>
                        <option value="Friend">{{__('forms.friend')}}</option>
                        <option value="Social Media">{{__('forms.social')}}</option>
                        <option value="Witness">{{__('forms.witness')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('forms.informer_phone_label')}}</label>
                    <input type="text" required name="informant_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{(__('forms.informer_phone_placeholder'))}}">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('forms.close')}}</button>
                <button type="submit" class="ChangeButton">{{__('forms.submit')}}</button>
            </div>
        </div>
        </form>

    </div>
</div>

<script>
    function popup() {
        $('[id*="exampleModalCenter"]').modal('show');
    }

    $(document).ready(function (){
        $('#status_edit').change(function (){
            $('#extension').empty();
           if($('#status_edit').val() === 'dead')
           {
               $('#extension').append(`
               <div class="form-group">
                    <label for="exampleInputEmail1">{{__('forms.dead_reason_label')}}</label>
                    <input type="text" required name="reason_of_dead" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{(__('forms.dead_reason_placeholder'))}}">
                </div>


                <div class="form-group">
                    <label for="arrested_date">{{__('forms.death_date')}}</label>
                    <input type="date" required id="arrested_date"  class="form-control" name="detained_date"/>

                </div>
               `);
           }
            if($('#status_edit').val() === 'detained')
            {
                $('#extension').append(`
               <div class="form-group">
                    <label for="exampleInputEmail1">{{__('forms.detained_reason_label')}}</label>
                    <input type="text" required name="reason_of_arrest" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{(__('forms.detained_reason_placeholder'))}}">
                </div>


                <div class="form-group">
                    <label for="arrested_date">{{__('forms.detained_date')}}</label>
                    <input type="date" required id="arrested_date"  class="form-control" name="detained_date"/>

                </div>
               `);
            }
            if($('#status_edit').val() === 'released')
            {
                $('#extension').append(`

                <div class="form-group">
                    <label for="arrested_date">{{__('forms.released')}}</label>
                    <input type="date" required id="arrested_date"  class="form-control" name="released_date"/>

                </div>
               `);
            }
            if($('#status_edit').val() === 'missing')
            {
                $('#extension').append(`

                <div class="form-group">
                    <label for="arrested_date">{{__('forms.missed_date')}}</label>
                    <input type="date" required id="arrested_date"  class="form-control" name="detained_date"/>

                </div>
               `);
            }
        });
    });
</script>
