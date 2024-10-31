<div>
    <div class="mb-3">
        <label for="peca" class="form-label">Peças:</label>
        <div id="containerPecas">
            <div id="criacaoPeca" class="d-flex col-6 mb-3">
                <div class="col-3">
                    <button class="btn" type="button" style="background-color: #6f42c1; color:#fff;"
                        onclick="increment(this)">+</button>
                    <input style="width: 2.0rem" class="text-center" name="peca[0][qtd]" type="text" value="0"
                        readonly>
                    <button class="btn" type="button" style="background-color: #6f42c1; color: #fff;"
                        onclick="decrement(this)">-</button>
                </div>
                {{-- <input type="text" class="form-control" name="peca[0][nome]" placeholder="Informe o nome da peça"
                    value="{{ old('preco') }}"> --}}
                <livewire:buscar-peca />
                <button type="button" class="btn col-4" onclick="criarInput()"
                    style="background-color:#6f42c1;color:#fff">Adicionar uma nova peça</button>
            </div>
        </div>
    </div>
</div>

<script>
    let contador = 1;

    function criarInput() {
        let originalDiv = document.getElementById('criacaoPeca');
        let novaDiv = originalDiv.cloneNode(true);

        novaDiv.removeAttribute('id');


        let inputNome = novaDiv.querySelector('input.form-control');
        let inputQtd = novaDiv.querySelector('input.text-center');

        inputNome.name = `peca[${contador}][nome]`;
        inputNome.value = '';

        inputQtd.name = `peca[${contador}][qtd]`;
        inputQtd.value = '0';

        contador++;


        let botaoAdicionar = novaDiv.querySelector('button.btn.col-4');
        botaoAdicionar.remove();

        document.getElementById('containerPecas').appendChild(novaDiv);
    }

    function increment(button) {
        let input = button.nextElementSibling;
        input.value = parseInt(input.value) + 1;
    }

    function decrement(button) {
        let input = button.previousElementSibling;
        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
