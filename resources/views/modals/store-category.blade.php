<!-- Modal Store Category-->
<div class="modal" id="storeCategory" tabindex="-1" role="dialog" aria-labelledby="storeCategoryTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeCategoryTitle">Adicionar categoria</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{ route('home.store.category') }}">
                    <fieldset>
                    @csrf
                    <div class="form-group">
                        <label for="InputName"  class="form-label mt-4">Nome</label>
                        <input type="text" class="form-control" id="InputName" name="name" value="{{ old('name') }}">
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

                <hr>

                @foreach ($categories as $category)
                <p class="d-flex justify-content-between">

                    <form method="post" action="{{ route('home.delete.category', $category->id) }}">
                        @csrf
                        @method('DELETE')

                        {{ $category->name }}

                        <button type="submit" class="close text-danger" aria-label="Close" onclick="return confirm('Tem certeza que deseja excluir?')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </fieldset>
                    </form>
                </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
