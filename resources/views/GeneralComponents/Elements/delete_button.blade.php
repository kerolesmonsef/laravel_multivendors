<button type="submit"
        data-toggle="modal"
        data-target="{{ $model_class ?? ".remove_model_class" }}"
        data-delete-url="{{ $delete_url }}"
        class="btn btn-danger btn-sm m-btn {{ $button_class ?? "delete_button_class" }}">
    <i class="far fa-trash-alt"></i> delete
</button>
