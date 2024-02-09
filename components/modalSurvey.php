<!-- Modal -->
<div class="modal fade" id="modalDetailSaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Saran Dan Masukan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="Nama" id="nama" class="form-label">Detail Saran dan masukan:</label>
                    <textarea class="form-control" name="masukan" id="saran" disabled rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {

        $('.tampilModal').on('click', function() {

            const id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: '<?= BASE_URL ?>dataApi.php?p=saran',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#saran').val(data[0].saran_masukan);
                }
            });
        });

    });
</script>