<!-- The Manage Modal -->
<div class="modal fade" id="manage-modal">
    <div class="modal-dialog modal-dialog-centered modal-sm ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Manage</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body col text-left">
                <a href="{{ route('leagues.manage') }}" class="text-decoration-none">Leagues</a><br>
                <a href="{{ route('players.manage') }}" class="text-decoration-none">Players</a><br>
                <a href="{{ route('clubs.manage') }}" class="text-decoration-none">Clubs</a><br>
                <a href="{{ route('season.manage') }}" class="text-decoration-none">Seasons</a><br>
                <a href="{{ route('tables.manage') }}" class="text-decoration-none">Seasonal tables</a><br>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- /The Manage Modal -->
