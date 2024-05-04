<div>
    <div wire:ignore>
        <div class="mt-4">
            <select id="user_id" class="form-select select2" tabindex="1">
                <option></option>
            </select>
        </div>
    </div>

    <div class="alert alert-success mt-3">
        Selected User ID : {{ $userId ?? '-' }}
    </div>
</div>

@script
<script>
window.addEventListener("load", (event) => {
    $('#user_id').select2({
        minimumInputLength: 2,
        dropdownParent: $(".container"),
        placeholder: '{{ __("Select user") }}',
        theme: "bootstrap-5",
        ajax: {
            dataType: 'json',
            url: '/select2/users',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page
                }
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    }),
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                };
            }
        }
    });

    $('#user_id').on('change', function (e) {
        let data = $('#user_id').select2("val");
        $wire.$set('userId', data);
    });
});
</script>
@endscript
