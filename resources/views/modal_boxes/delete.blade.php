<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;">
            <form id="delete-transfers" method="POST">
                @csrf
                @method('delete')
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0">
                            Choose an action!</p>
                    </div>
                    <button type="button" class="close text-dark pt-1" style="opacity: 1" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true" style="padding-right: 10px;font-weight: 500">&times;</span>
                    </button>
                </div>

                <div class="modal-footer border-0 justify-content-center mx-3 pr-0 mb-2 mt-4">
                    <button type="submit" class="btn btn-danger pl-3" style="font-size: 16px!important;"
                            > Delete </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    function deleteItem($item,$id) {
        $('#delete-transfers').attr('action', $item+ '/' + $id);
    }
</script>
