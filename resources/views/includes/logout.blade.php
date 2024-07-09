<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h1 class="modal-title fs-5" id="addUserLabel" style="font-weight: 700; color:black">Logout</h1>
            </div>
            <div class="modal-body d-flex justify-content-center">
                Are you sure want to logout?
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{ url('login') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>