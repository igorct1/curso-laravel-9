{{-- token para validação --}}
@csrf
<textarea class="form-control"name="body" id="" cols="30" rows="10" placeholder="Insira aqui o seu cometário"></textarea>
<label  class="form-check-label mt-2 "for="visible">
    <input class="form-check-input" type="checkbox" name="visible">
    Visível?
</label>
<br>
<button class="btn btn-success mt-2"type="submit">Enviar</button>