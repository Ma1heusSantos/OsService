<div class="modal fade" id="modalExcluir{{ $veiculo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Veiculo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir <strong> {{ $veiculo->modelo ?? 'o mecânico' }} </strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <a href="{{ route('delete.veiculos', [$veiculo->id]) }}" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>
