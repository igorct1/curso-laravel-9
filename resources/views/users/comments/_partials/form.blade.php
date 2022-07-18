{{-- token para validação --}}
@csrf
<textarea class="form-control"name="body" id="" cols="30" rows="10" placeholder="Insira aqui o seu cometário">{{ $comment->body ?? old('body') }}</textarea>
<label  class="form-check-label mt-2 "for="visible">
    <input class="form-check-input" type="checkbox" name="visible" 
        @if(isset($comment) && $comment->visible)
            checked="checked"
        @endif
    >
    Visível?
</label>
<br>
<button class="btn btn-success mt-2"type="submit">Enviar</button>