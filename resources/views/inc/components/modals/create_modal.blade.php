<!-- The Manage Modal -->
<div class="modal fade" id="create-modal">
    <div class="modal-dialog modal-dialog-centered modal-sm ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Manage</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body col text-left">
                <a href="{{ route('leagues.create') }}" class="text-decoration-none">Leagues</a><br>
                <a href="{{ route('players.create') }}" class="text-decoration-none">Players</a><br>
                <a href="{{ route('clubs.create') }}" class="text-decoration-none">Clubs</a><br>
                <a href="{{ route('season.create') }}" class="text-decoration-none">Seasons</a><br>
                <a href="{{ route('tables.create') }}" class="text-decoration-none">Seasons stats</a><br>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- /The Manage Modal -->
