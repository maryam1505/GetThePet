<!-- Modal -->
<div class="modal fade" id="AskQuestion" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="AskQuestionpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AskQuestionpLabel">Ask a Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ask.question')}}" method="post">
                    @csrf
                    <input type="hidden" name="user-id">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('admin/img/user.jpg') }}" alt="user" style="width:3vw;"
                            class="rounded-circle mr-3">
                        <h6 class="m-0">Ayesha Maryam</h6>
                    </div>
                    <div class="contact_section col-12 mb-5">
                        <textarea class="w-100 custom-css form-control" name="question" style="" placeholder="Ask a Question"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary rounded">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
